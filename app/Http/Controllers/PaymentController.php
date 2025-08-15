<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stripe\Stripe;
use Stripe\Charge;
use App\Models\Sale;



class PaymentController extends Controller
{
    public function processPayment(Request $request)
    {
        Stripe::setApiKey(config('services.stripe.secret'));

        try {
            $charge = Charge::create([
                'amount' => $request->total_price * 100,
                'currency' => 'usd',
                'description' => $request->product_name,
                'source' => $request->stripeToken,
            ]);

            Sale::create([
                'product_name' => $request->product_name,
                'quantity' => $request->quantity,
                'total_price' => $request->total_price,
                'customer_name' => $request->customer_name,
                'contact' => $request->contact,
                'address' => $request->address,
            ]);

            return back()->with('success', 'Payment successful!');
        } catch (\Exception $e) {
            return back()->with('error', 'Payment failed: ' . $e->getMessage());
        }

    return view('payment');
}
    }