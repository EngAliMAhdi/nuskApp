<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\AirTransports;
use App\Models\Booking;
use App\Models\Bouquet;
use App\Models\Discount;
use App\Models\Package;
use App\Models\SocialLink;
use App\Models\Transport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class PackageController extends BaseController
{
    public function bouquets()
    {

        $data1 = [];
        $data = Bouquet::orderBy('id', 'desc')->get();
        if (!$data) {
            return $this->sendResponse([], 'لا يوجد بيانات');
        }
        foreach ($data as $item) {
            $data1[] = $item->getAllDetails();
        }
        return $this->sendResponse($data1, 'تم جلب البيانات بنجاح');
    }
    public function backages($id)
    {
        $data1 = [];
        $data = Package::where('bouquet_id', $id)
            ->orderBy('id', 'desc')
            ->get();
        if (!$data) {
            return $this->sendResponse([], 'لا يوجد بيانات');
        }
        foreach ($data as $item) {

            $data1[] = [
                'id' => $item->id,
                'name' => $item->name,
                'image' => asset('storage/' . $item->image),
                'base_price' => ' ريال / شخص ' . $item->base_price,

            ];
        }
        return $this->sendResponse($data1, 'تم جلب البيانات بنجاح');
    }

    public function backages1($id)
    {
        $data1 = [];
        $item = Package::find($id);
        if (!$item) {
            return $this->sendResponse([], 'لا يوجد بيانات');
        }

        $discount = Discount::first();
        if ($discount) {
            $price_company = $item->base_price - ($item->base_price * $discount->d_company / 100);
            $price_person = $item->base_price - ($item->base_price * $discount->d_person / 100);
            $price_under_two = $item->base_price - ($item->base_price * $discount->d_under_two / 100);
            $price_between_two_ten = $item->base_price - ($item->base_price * $discount->d_between_two_ten / 100);
        }
        $data1 = [
            'id' => $item->id,
            'name' => $item->name,
            'image' => asset('storage/' . $item->image),
            'base_price' => $item->base_price,
            'price_company' => isset($price_company) ? $price_company  : null,
            'price_person' => isset($price_person) ? $price_person : null,
            'price_under_two' => isset($price_under_two) ? $price_under_two  : null,
            'price_between_two_ten' => isset($price_between_two_ten) ? $price_between_two_ten  : null,
            'tranport_type' => $item->transport_type == 'App\Models\LandTransport' ? 'نقل بري' : 'نقل جوي',
            'rate' => 0,
            'free_services' => [
                'انترنت'
            ],
            'photos_hotels' => $item->hotel->hotelImages->pluck('image_url')->take(5),
            'description' => $item->description,
            'summary' => [
                'place_departure' => $item->place_departure,
                'time_arrival' => $item->time_arrival . ' ' . $item->valid_from,
                'time_departure' => $item->time_departure,
                'time_return' => $item->time_return . ' ' . $item->valid_to,
                'hotel_name' => $item->hotel->name,
                'distance_hotel' => $item->distance_hotel,
                'stop_points' => $item->stop_points,
                'notes' => $item->notes,
            ],
            'hotel' => [
                'hotel_name' => $item->hotel->name,
                'distance_hotel' => $item->distance_hotel,
                // 'photos_hotels' => $item->hotel->hotelImages->pluck('image_url')
            ],
            'tranport' => [
                'tranport_type' => $item->transport_type == 'App\Models\LandTransport' ? 'نقل بري' : 'نقل جوي',
                'tranport_name' =>  $item->transport_type == 'App\Models\LandTransport' ? Transport::find($item->transport_id)->name : AirTransports::find($item->transport_id)->airplane
            ]

        ];

        return $this->sendResponse($data1, 'تم جلب البيانات بنجاح');
    }

    public function booking(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'package_id' => 'required|exists:packages,id',
            'people' => 'required|array',
            'people.*.first_name' => 'required',
            'people.*.last_name' => 'required',
            'people.*.birth_date' => 'required|date',
            'people.*.nationality' => 'required',
            'people.*.national_id' => 'required',
        ]);
        $total = 0;
        if ($validator->fails()) {
            $errors = $validator->errors();
            $msgs = [];
            foreach ($errors->all() as  $ind => $message) {
                array_push($msgs, $message);
            }
            return $this->sendError('Validation Error.', $msgs);
        }
        $discount = Discount::first();

        $booking = Booking::create([
            'user_id' => Auth::id(),
            'package_id' => $request->package_id,
            'method_paid' => $request->payment_method,
            'total_price' => 0
        ]);
        foreach ($request->people as $person) {
            $price = Package::find($request->package_id)->base_price;
            $type = $this->determineType($person['birth_date']);

            switch ($type) {
                case 'company':
                    $price -= ($price * $discount->d_company / 100);
                    break;
                case 'person':
                    $price -= ($price * $discount->d_person / 100);
                    break;
                case 'under_two':
                    $price -= ($price * $discount->d_under_two / 100);
                    break;
                case 'between_two_ten':
                    $price -= ($price * $discount->d_between_two_ten / 100);
                    break;
            }

            $booking->people()->create([
                ...$person,
                'price' => $price,
                'type' => $type,
            ]);

            $total += $price;
        }

        $booking->update([
            'total_price' => $total
        ]);
        return $this->sendResponse($booking, 'Booking successfully');
    }
    private function determineType($birthDate)
    {
        $age = \Carbon\Carbon::parse($birthDate)->age;

        if ($age < 2) {
            return 'under_two';
        } elseif ($age >= 2 && $age <= 10) {
            return 'between_two_ten';
        }
        if (Auth::user()->role == "user") {
            return 'person';
        } else {
            return 'company';
        }
    }
    public function social()
    {
        $data = SocialLink::first();
        $data->website = env("APP_URL");
        return $this->sendResponse($data, 'get Links');
    }
}
