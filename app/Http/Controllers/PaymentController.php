<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Paystack;
use App\Payment;

class PaymentController extends Controller
{
    //
    /**
    * Redirect the User to Paystack Payment Page
    * @return Url
    */
   public function redirectToGateway(Request $request)
   {
     // get the order ids
     $order_ids =  (array)(\App\CollectionCommission::getUserUnsettled(auth()->user()))->pluck('id');
     // get the first element
     $order_ids = array_shift($order_ids);
     // convert request ids to array
     $request_order_ids = explode(',', $request->order_ids);
     // calculate the branchs total due commision
     $totalCommission = str_replace('.', '', \App\CollectionCommission::savingsPercentage(\App\CollectionCommission::dueSavings(auth()->user())[auth()->user()->id]));
     // validate incase of form manipulation
     // sort and check if has same values
     if ( count(array_diff($request_order_ids, $order_ids) ) > 0
          || $totalCommission != $request->amount
        ) return back()->withErrors(['error' => 'Form was modified']);

      // start payment in db
      Payment::create([
        'order_ids' => $request->order_ids,
        'status' => 'pending',
        'branch_id' => auth()->user()->id,
        'amount' => (float)substr_replace($request->amount,'.',-2),
        'order_type' => 'collection_commission',
      ]);

       return Paystack::getAuthorizationUrl()->redirectNow();
   }

   // private function validate(){
   //   return $request->all();
   // }

   /**
    * Obtain Paystack payment information
    * @return void
    */
   public function handleGatewayCallback()
   {
       $paymentDetails = Paystack::getPaymentData();

       if (!$paymentDetails['status']) {
         // code...
         return response()->json(['status' => false, 'message' => $paymentDetails['message']]);
       }

       if ($paymentDetails['status']) {
         // code...
         $payment = Payment::where('status', 'pending')->where('branch_id', auth()->user()->id)->latest();

         $payment->update([
           'status' => $paymentDetails['status'],
           'reference' => $paymentDetails['data']['reference'],
           'authorization_code' => $paymentDetails['data']['authorization']['authorization_code'],
           'currency_code' => $paymentDetails['data']['currency'],
           'payed_at' => NOW(),//$paymentDetails['data']['paidAt'],
         ]);

         // set due to undue
         \App\CollectionCommission::undue(explode(',', $paymentDetails['data']['metadata']['order_ids'] ));
       }

       return response()->json(['status' => true, 'message' => $paymentDetails['message']]);
       // dd($paymentDetails);
       // Now you have the payment details,
       // you can store the authorization_code in your db to allow for recurrent subscriptions
       // you can then redirect or do whatever you want
   }
}
