<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Omnipay\Omnipay;
use App\Payment;
use App\Project;
use Illuminate\Support\Facades\Auth;

class PaymentController extends Controller
{

            // permission
    function __construct()
    {
     // payment permissions
        $this->middleware('permission:pay-projects', ['only' => ['pay']]);
        $this->gateway = Omnipay::create('PayPal_Rest');
        $this->gateway->setClientId(env('PAYPAL_CLIENT_ID'));
        $this->gateway->setSecret(env('PAYPAL_CLIENT_SECRET'));
        $this->gateway->setTestMode(false); //set it to 'false' when go live

    }

    public $gateway;

    // public function __construct()
    // {
    //     $this->gateway = Omnipay::create('PayPal_Rest');
    //     $this->gateway->setClientId(env('PAYPAL_CLIENT_ID'));
    //     $this->gateway->setSecret(env('PAYPAL_CLIENT_SECRET'));
    //     $this->gateway->setTestMode(false); //set it to 'false' when go live
    // }

    public function pay(Request $request, $id)
    {
            $user = Auth::user()->id;
            $job = Project::find($id);

            try {
                $response = $this->gateway->purchase(array(
                    'amount' => $job->total_amount,
                    'project_id' => $job->project_id,
                    'user_id' => $job->$user,
                    'currency' => env('PAYPAL_CURRENCY'),
                    'returnUrl' => url('paymentsuccess'),
                    'cancelUrl' => url('paymenterror'),
                ))->send();

                if ($response->isRedirect()) {
                   // $row = Project::find($id);
                    // $row->paid = 1;
                    // $row->save();

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
                // $row = Project::find($id);
                // $row->paid = 1;
                // $row->save();

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
                    
                    $Project = new Project;
                    $Project = Project::find($id);
                    $Project->paid = 1;
                    $Project->save();

                }


                // return "Payment is successful. Your transaction id is: ". $arr_body['id'];
                return redirect()->route('projects.index')->with('success', 'Payment Success');
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
