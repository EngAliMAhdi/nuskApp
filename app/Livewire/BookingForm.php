<?php

namespace App\Livewire;

use App\Models\Booking;
use App\Models\Discount;
use App\Models\Package;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class BookingForm extends Component
{
    public $package;
    public $people = [];
    public $total = 0;
    public $payment_method = 'cash';


    public function mount(Package $package)
    {
        $this->package = $package;
        $this->people = [
            ['first_name' => '', 'last_name' => '', 'birth_date' => '', 'nationality' => '', 'national_id' => '']
        ];
    }

    public function addPerson()
    {
        $this->people[] = ['first_name' => '', 'last_name' => '', 'birth_date' => '', 'nationality' => '', 'national_id' => ''];
    }

    public function removePerson($index)
    {
        unset($this->people[$index]);
        $this->people = array_values($this->people);
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


    public function save()
    {
        $discount = Discount::first();

        $total = 0;
        $booking = Booking::create([
            'user_id' => Auth::id(),
            'package_id' => $this->package->id,
            'method_paid' => $this->payment_method,
            'total_price' => 0
        ]);

        foreach ($this->people as $person) {
            $price = $this->package->base_price;
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
            $this->total = $total;
        }

        $booking->update([
            'total_price' => $total
        ]);
        session()->flash('success', 'تم الحجز بنجاح!');

        if ($this->payment_method === 'cash') {
            return redirect()->route('package.index');
        }

        return redirect()->route('user.payment', $booking->id);
    }

    public function render()
    {
        // foreach ($this->people as $person) {
        //     $price = $this->package->base_price;
        //     $type = $this->determineType($person['birth_date']);
        //     $discount = Discount::first();
        //     switch ($type) {
        //         case 'company':
        //             $price -= ($price * $discount->d_company / 100);
        //             break;
        //         case 'person':
        //             $price -= ($price * $discount->d_person / 100);
        //             break;
        //         case 'under_two':
        //             $price -= ($price * $discount->d_under_two / 100);
        //             break;
        //         case 'between_two_ten':
        //             $price -= ($price * $discount->d_between_two_ten / 100);
        //             break;
        //     }
        //     $this->total += $price;
        // }
        return view('livewire.booking-form');
    }
}
