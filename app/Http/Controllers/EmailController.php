<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Stripe\Stripe;
use Stripe\Customer;

class EmailController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        $this->user =  \Auth::user();
    }

    public function addEmailDomain(Request $request){

        try{

            Stripe::setApiKey(env('STRIPE_SECRET_KEY'));

            $user = User::find(1);
            $user->newSubscription('main', 'email')->create($request->stripeToken);

            $this->CreateConnection();

            // add domain to qmailbox

        } catch (\Exception $ex) {

            return redirect('home')->with('status', $ex->getMessage());

        }
    }

    public function CreateConnection(Request $request){

        $url = 'https://api.qboxmail.com/api/';
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_URL,$url);
        $ex=curl_exec($ch);
        curl_close($ch);
        var_dump(json_decode($ex, true));

    }


}
