<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Srmklive\PayPal\Services\PayPal as PayPalClient;


class PayPalController extends Controller
{
    public function processTransaction(Request $request)
    {
        // جلب بيانات الحصة المختارة
        $booking = Booking::findOrFail($request->booking_id);
        $user = Auth::user();
        $response = Http::get('https://open.er-api.com/v6/latest/SAR');

        if ($response->failed()) {
            return response()->json(['error' => 'فشل في جلب سعر الصرف'], 500);
        }

        $rates = $response->json();
        $usdRate = $rates['rates']['USD'] ?? null;

        if (!$usdRate) {
            return response()->json(['error' => 'سعر صرف USD غير متوفر'], 500);
        }


        $usdPrice = round($booking->total_price * $usdRate, 2);
        $provider = new PayPalClient;
        $provider->setApiCredentials(config('paypal'));
        $paypalToken = $provider->getAccessToken();
        $order = $provider->createOrder([
            "intent" => "CAPTURE",
            "purchase_units" => [
                [
                    "amount" => [
                        "currency_code" => "USD",
                        "value" => $usdPrice
                    ]
                ]
            ]
        ]);

        return response()->json($order);
    }

    public function captureTransaction(Request $request)
    {
        $provider = new PayPalClient;
        $provider->setApiCredentials(config('paypal'));
        $provider->getAccessToken();

        $booking = Booking::find($request->booking_id);
        if (!$booking) {
            return response()->json(['message' => 'فشل الدفع!'], 400);
        }
        $result = $provider->capturePaymentOrder($request->orderID);

        if ($result['status'] === "COMPLETED") {
            $booking->update([
                'payment_status' => 'paid',
                'payment_reference' => $request->orderID
            ]);
            $booking->save();
            return response()->json(['message' => 'تم الدفع بنجاح!']);
        }

        return response()->json(['message' => 'فشل الدفع!'], 400);
    }
}
