<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Razorpay\Api\Api;
use Exception;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use App\Models\Payment;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\Package;
use App\Models\Address;

class RazorpayPaymentController extends Controller
{
    public function index($id) {  
        // $id = $id;     
        $package =  Package::where('id',$id)->first();
        $address = Address::where('user_id',Auth::user()->id)->where('is_default','1')->first();
        return view('admin.payment.razorpayView',compact('package','address'));
    }

    public function store(Request $request) {

        $payments = Payment::find($request->payment_id);
        $payments->transaction_no = 'TRXN'.date('dmy').time();
        $payments->is_pay = 'YES';
        $payments->payment_date = date('y-m-d H:i:s');
        $payments->save();

        $data = $request->all();
        // $api = new Api(env('RAZORPAY_KEY'), env('RAZORPAY_SECRET'));  
        $api = new Api('rzp_test_mpwfYrksWHIGnE', 'J58wvxhjPgH6Pky9Ct97Anjn');  
        $payment = $api->payment->fetch($data['razorpay_payment_id']);
        $data['payment'] = $payment;
        if(count($data)  && !empty($data['razorpay_payment_id'])) {
            try {
                $response = $api->payment->fetch($data['razorpay_payment_id'])->capture(array('amount'=>$payment['amount'])); 
                $data['responce'] = $response;
                Session::put('success', 'Payment successful');
            } catch (Exception $e) {
                Session::put('error',$e->getMessage());                
            }
        }
        Alert::success('Thank you','Payment success');
        return redirect()->route('welcome');
    }

    public function paymentOrderSave(Request $request) {

        $payment = new Payment();
        $payment->user_name = $request->name; 
        $payment->user_id = Auth::user()->id; 
        $payment->package_id = $request->package_id; 
        $payment->user_email = $request->email; 
        $payment->contact_no = $request->contactNumber; 
        $payment->address = $request->address; 
        $payment->amount = $request->amount; 
        $payment->payment_mode = $request->pmode; 
        $payment->is_pay ='NO'; 
        $payment->save() ; 

        $data1=[
            'name' => $request->name,
            'email' => $request->email,
            'contactNumber' => $request->contactNumber,
            'address' => $request->address,
            'amount' => $request->amount,
            'pmode' => $request->pmode,
            'payment_id'=> $payment->id
        ];
        $data = (object) $data1;
        Session::put('razorpayData', $data);
        return redirect('/payment/CreateOrder');
    }

    public function paymentCreateOrder() {
        $data = Session::get("razorpayData");
        return view('admin.payment.razorpayPaymentView')->with('data',$data);
    }

    public function PaymentList()
    {
        $payments = Payment::orderBy('id','desc')->get();
        return view('admin.payment.paymentList',compact('payments'));
    }
}
