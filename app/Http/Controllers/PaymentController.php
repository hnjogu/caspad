<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Omnipay\Omnipay;
use App\Payment;
use App\Project;
use Illuminate\Support\Facades\Auth;

class PaymentController extends Controller
{

    public $gateway;

    public function __construct()
    {
        $this->gateway = Omnipay::create('PayPal_Rest');
        $this->gateway->setClientId(env('PAYPAL_CLIENT_ID'));
        $this->gateway->setSecret(env('PAYPAL_CLIENT_SECRET'));
        $this->gateway->setTestMode(true); //set it to 'false' when go live
    }


    public function charge(Request $request, $id)
    {
        $user = Auth::user()->id;
        $row = Project::find($id);

            try {
                $response = $this->gateway->purchase(array(
                  'amount' => $row->total_amount,
                  'project_id' => $row->project_id,
                  'user_id' => $row->$user,
                  'currency' => env('PAYPAL_CURRENCY'),
                  'returnUrl' => url('paymentsuccess'),
                  'cancelUrl' => url('paymenterror'),
                ))->send();

                if ($response->isRedirect()) {
                      // Update projects paid status
                      $row = Project::find($id);
                      $row->paid = 1;
                      $row->save();

                    $response->redirect(); // this will automatically forward the customer
                } else {
                    // not successful
                    return $response->getMessage();
                }
            } catch(Exception $e) {
                return $e->getMessage();
            }
    }

    public function payment_success(Request $request)
    {
        // Once the transaction has been approved, we need to complete it.
        if ($request->input('paymentId') && $request->input('PayerID'))
        {
            $transaction = $this->gateway->completePurchase(array(
                'payer_id'             => $request->input('PayerID'),
                'transactionReference' => $request->input('paymentId'),
            ));
            $response = $transaction->send();

            if ($response->isSuccessful())
            {
                // The customer has successfully paid.
                $arr_body = $response->getData();

                // Insert transaction data into the database
                $isPaymentExist = Payment::where('payment_id', $arr_body['id'])->first();

                if(!$isPaymentExist)
                {
                    $payment = new Payment;
                    $payment->payment_id = $arr_body['id'];
                    $payment->user_id = Auth::user()->id;
                    $payment->payer_id = $arr_body['payer']['payer_info']['payer_id'];
                    $payment->payer_email = $arr_body['payer']['payer_info']['email'];
                    $payment->amount = $arr_body['transactions'][0]['amount']['total'];
                    $payment->currency = env('PAYPAL_CURRENCY');
                    $payment->payment_status = $arr_body['state'];
                    $payment->save();

                }

                // return "Payment is successful. Your transaction id is: ". $arr_body['id'];
                return redirect()->route('projects.index')->with('success', 'Payment successful transaction ID is: '. $arr_body['id']);
            } else {
                return $response->getMessage();
            }
        } else {
            return redirect()->route('project.index')->with('success', 'Payment Cancelled');
        }
    }

    public function payment_error()
    {
      return redirect()->route('projects.index')->with('success', 'Payment Error');
    }

}
