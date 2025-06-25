<?php

namespace App\Livewire;

use App\Models\Booking;
use Livewire\Component;
use Livewire\WithPagination;

class BookingPage extends Component
{
    use WithPagination;

    public $name;
    protected $listeners = ['delete-item' => 'deleteItem'];

    public function updateStatus($id, $value)
    {
        $booking = Booking::findOrFail($id);
        $booking->status = $value;
        $booking->save();
    }

    public function updateMethod($id, $value)
    {
        $booking = Booking::findOrFail($id);
        $booking->method_paid = $value;
        $booking->save();
    }

    public function updatePaymentStatus($id, $value)
    {
        $booking = Booking::findOrFail($id);
        $booking->payment_status = $value;
        $booking->save();
    }

    public function deleteItem($id)
    {
        $data = Booking::find($id);
        if ($data) {
            $data->delete();
            session()->flash('success', 'تم الحذف بنجاح.');
            return redirect()->route('booking.admin.index');
        }
    }
    public function render()
    {
        $users = Booking::select('user_id')
            ->with('user:id,username')
            ->groupBy('user_id')
            ->get();
        $query = Booking::orderBy('id', 'desc');
        if ($this->name) {
            $query->where('user_id',  $this->name);
        }

        $data = $query->paginate(10);
        return view('livewire.booking-page', compact('data', 'users'));
    }
}
