<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\About;
use App\Models\AirTransports;
use App\Models\Booking;
use App\Models\Discount;
use App\Models\Inquiry;
use App\Models\Package;
use App\Models\SocialLink;
use App\Models\Transport;
use Illuminate\Http\Request;


class HomeController extends Controller
{
    public function index()
    {
        $data = Package::orderBy('id', 'desc')->take(6)->get();
        return view('user.index', compact('data'));
    }
    public function packages()
    {
        return view('user.package');
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'message' => 'required|string|max:1000',
        ]);
        $data = $request->all();
        Inquiry::create($data);

        return redirect()->back()->with('success', 'تم إرسال الاستفسار بنجاح.');
    }
    public function contact()
    {
        $data = SocialLink::first();
        return view('user.contact', compact('data'));
    }
    public function about()
    {
        $data = About::all();
        return view('user.about', compact('data'));
    }
    
    public function package($id)
    {
        $data = [];
        $item = Package::find($id);
        if (!$item) {
            return redirect()->back()->with('error', 'غير موجود ');
        }

        $discount = Discount::first();
        if ($discount) {
            $price_company = $item->base_price - ($item->base_price * $discount->d_company / 100);
            $price_person = $item->base_price - ($item->base_price * $discount->d_person / 100);
            $price_under_two = $item->base_price - ($item->base_price * $discount->d_under_two / 100);
            $price_between_two_ten = $item->base_price - ($item->base_price * $discount->d_between_two_ten / 100);
        }
        $data = [
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
        // dd($data['photos_hotels']);

        return view('user.packageDetails', compact('data'));
    }

    public function term()
    {
        return view('user.term');
    }
    public function privacy()
    {
        return view('user.privacy');
    }
    public function register()
    {
        return view('user.auth.user');
    }
}
