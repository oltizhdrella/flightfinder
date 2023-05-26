<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Models\PurchasedTicket;
use Illuminate\Http\Request;
use Srmklive\PayPal\Services\PayPal as PayPalClient;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

class PaymentController extends Controller
{
    public function handlePayment(Request $request)
    {

        if (isset($_GET['return_date'])) {
            $request->session()->put('return_date', $_GET['return_date']);
        } else {
            $request->session()->put('return_date', null);
        }

        $request->session()->put('from', $_GET['from']);
        $request->session()->put('to', $_GET['to']);
        $request->session()->put('departure_date', $_GET['departure_date']);
        $request->session()->put('class', $_GET['class']);
        $request->session()->put('flight_id', $_GET['flight_id']);
        

        $provider = new PayPalClient;
        $provider->setApiCredentials(config('paypal'));
        $paypalToken = $provider->getAccessToken();
        
        
        $response = $provider->createOrder([
            "intent" => "CAPTURE",
            "application_context" => [
                "return_url" => route('success.payment'),
                "cancel_url" => route('cancel.payment'),
            ],
            "purchase_units" => [
                0 => [
                    "amount" => [
                        "currency_code" => 'USD',
                        "value" => $_GET['amount'],
                    ]
                ]
            ],

        ]);
       
        if (isset($response['id']) && $response['id'] != null) {
            foreach ($response['links'] as $links) {
                if ($links['rel'] == 'approve') {
                    return redirect()->away($links['href']);
                }
            }
            return redirect()
                ->route('cancel.payment')
                ->with('error', 'Something went wrong.');
        } else {
            return redirect()
                ->route('create.payment')
                ->with('error', $response['message'] ?? 'Something went wrong.');
        }
    }

    public function paymentCancel()
    {
        return redirect()
            ->route('create.payment')
            ->with('error', $response['message'] ?? 'You have canceled the transaction.');
    }

    public function paymentSuccess(Request $request)
    {
        $provider = new PayPalClient;
        $provider->setApiCredentials(config('paypal'));
        $provider->getAccessToken();
        $response = $provider->capturePaymentOrder($request['token']);

        if (isset($response['status']) && $response['status'] == 'COMPLETED') {
            Payment::create(['user_id' => Auth::user()->id, 'amount' => intval($response['purchase_units'][0]['payments']['captures'][0]['amount']['value']), 'currency' => $response['purchase_units'][0]['payments']['captures'][0]['amount']['currency_code']]);
            PurchasedTicket::create([
                'user_id' => Auth::user()->id, 'from_city' => $request->session()->get('from'), 'to_city' => $request->session()->get('to'),
                'departure_date' => $request->session()->get('departure_date'), 'return_date' => $request->session()->get('return_date'), 'class' => $request->session()->get('class')
            ]);

            $httpget = Http::get('abt.test/api/'.API_TOKEN.'/book/flight?flight_id='.$request->session()->get('flight_id').'&class='.$request->session()->get('class'));

            $request->session()->forget('from');
            $request->session()->forget('to');
            $request->session()->forget('departure_date');
            $request->session()->forget('return_date');
            $request->session()->forget('class');
            $request->session()->forget('flight_id');
            
            return redirect()
                ->route('home')
                ->with('success', 'Flight Ticket Purchased!.');
        } else {
            return redirect()
                ->route('home')
                ->with('error', $response['message'] ?? 'Something went wrong.');
        }
    }
}
