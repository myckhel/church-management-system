<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Paystack;

class PaymentController extends Controller
{
    //
    /**
    * Redirect the User to Paystack Payment Page
    * @return Url
    */
   public function redirectToGateway()
   {
       return Paystack::getAuthorizationUrl()->redirectNow();
   }

   /**
    * Obtain Paystack payment information
    * @return void
    */
   public function handleGatewayCallback()
   {
       $paymentDetails = Paystack::getPaymentData();

       dd($paymentDetails);
       // Now you have the payment details,
       // you can store the authorization_code in your db to allow for recurrent subscriptions
       // you can then redirect or do whatever you want
   }
}
