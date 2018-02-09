<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Stripe\Stripe;
use Stripe\Customer;
use Stripe\Charge;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->user =  \Auth::user();
    }

    public function charge(Request $request)
    {
        try {
            Stripe::setApiKey(env('STRIPE_SECRET_KEY'));

            $customer = Customer::create(array(
                'email' => $request->stripeEmail,
                'source' => $request->stripeToken
            ));

            $charge = Charge::create(array(
                'customer' => $customer->id,
                'amount' => 500,
                'currency' => 'gbp'
            ));

            return 'Charge successful!';

            //$this->$createAPP();

        } catch (\Exception $ex) {
            return $ex->getMessage();
        }
    }

    public function createApp(Request $request)
    {
        //create website
    }

    public function subscribe_process_app(Request $request)
    {

        try {
            Stripe::setApiKey(env('STRIPE_SECRET_KEY'));

            $user = User::find(1);
            $userID = $user->sp_id;
            $user->newSubscription('main', 'app')->create($request->stripeToken);

            $domain = $request['domain'];
            $appname = $request['domain'];
            $appname = str_replace(".", "", $appname);
            $domains = '';

            \SP::app_create($appname, $userID, 'php7.1', $domains=array("$domain", "www.$domain"));

            return redirect('home')->with('status', 'Payment successful, you are subscribed to APP - £5.00 monthly. We emailed you details about your new website.');
        } catch (\Exception $ex) {

            return redirect('home')->with('status', $ex->getMessage());

        }

    }

    public function subscribe_email(Request $request)
    {
        try {
            Stripe::setApiKey(env('STRIPE_SECRET_KEY'));

            $user = User::find(1);
            $user->newSubscription('main', 'email')->create($request->stripeToken);

            return redirect('home')->with('status', 'Payment successful, you are subscribed to APP - £5.00 monthly');
        } catch (\Exception $ex) {

            return redirect('home')->with('status', $ex->getMessage());

        }

    }

    public function subscribe_dns(Request $request)
    {
        try {
            Stripe::setApiKey(env('STRIPE_SECRET_KEY'));

            $user = User::find(1);
            $user->newSubscription('main', 'dns')->create($request->stripeToken);

            return redirect('home')->with('status', 'Payment successful, you are subscribed to APP - £5.00 monthly');
        } catch (\Exception $ex) {

            return redirect('home')->with('status', $ex->getMessage());

        }

    }

    public function subscribe_cancel(Request $request)
    {
        try {
            Stripe::setApiKey(env('STRIPE_SECRET_KEY'));

            $user = User::find(1);
            $user->subscription('main', 'app')->cancel();

            return 'You have cancelled your subscription for App!';
        } catch (\Exception $ex) {
            return $ex->getMessage();
        }

    }

    public function invoices()
    {
        try {
            Stripe::setApiKey(env('STRIPE_SECRET_KEY'));

            $user = User::find(1);

            $invoices = $user->invoices();

            return view('invoices', compact('invoices'));

        } catch (\Exception $ex) {
            return $ex->getMessage();
        }

    }

    public function invoice($invoice_id)
    {
        try {
            Stripe::setApiKey(env('STRIPE_SECRET_KEY'));

            $user = User::find(1);

            return $user->downloadInvoice($invoice_id, [
                'vendor'  => 'Your Company',
                'product' => 'Your Product',
            ]);

        } catch (\Exception $ex) {
            return $ex->getMessage();
        }

    }



}