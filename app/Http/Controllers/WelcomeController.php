<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CMS;
use App\Models\Blog;
use App\Models\Testimonial;
use App\Models\ContactUs;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactMail;
use App\Mail\UserContactMail;
use App\Models\Package;
use App\Models\Questions;
use App\Models\Answer;
use App\Models\Payment;
use App\Models\User;
use App\Models\Address;

class WelcomeController extends Controller
{
    public function welcome()
    {
        $cms = CMS::where('status','1')->orderBy('id','desc')->get();
        $blogs = Blog::where('status',1)->orderBy('id','desc')->get();
        $testimonial = Testimonial::where('status',1)->orderBy('id','desc')->get();
        $package = Package::where('status','YES')->orderBy('id','desc')->get();
        $question = Questions::orderBy('sequence','ASC')->get();
        foreach($question as $key=>$val)
        {
            $values = explode(", ", $val->values);
            $question[$key]->values = $values;
        }
        return view('welcome')->with('cms',$cms)->with('blog',$blogs)->with('testimonial',$testimonial)->with('package',$package)->with('question',$question);
    }

    public function blogDetails($id)
    {
        $blog = Blog::where('id',$id)->first();
        return view('admin.blog.details',compact('blog'));
    }

    public function submitContact(Request $request){

        // for user

          $userdetails = [
            'body' =>'Stay connect,stay save',
            'name' =>$request->name,
        ];
        $to = $request->email;
        Mail::to($to)->send( new UserContactMail($userdetails)); 

        // for admin

        $details = [
            'title' => $request->name. ' ' .' try to reach you',
            'useremail' =>$request->email,
            'username' =>$request->name,
            'contact' =>$request->contact,
        ];

        Mail::to('shakilbluehorse@gmail.com')->send( new ContactMail($details)); 


      
            $contact = new ContactUs();
            $contact->user_name = $request->name;
            $contact->user_email = $request->email;
            $contact->contact_no = $request->contact;
            $contact->save();

        
            Alert::success('Thank you for contact','We will contact you soon');
            return back();

    }

    public function questionaries(){
        $question = Questions::orderBy('sequence','ASC')->get();
        foreach($question as $key=>$val)
        {
            $values = explode(", ", $val->values);
            $question[$key]->values = $values;
        }
        return view('admin.question.question',compact('question'));
    }

    public function submitAnswer(Request $request){
        // dd($request->all());
        $answer = new Answer();
        $answer->user_id = Auth::user()->id;
        $answer->question_id = $request->question_id;
        $answer->question_type = $request->question_type;
        if($request->question_type == 'checkbox'){
            $newvalue = implode(", ",  $request->checkBoxValue);
            $answer->answers = $newvalue;
        }
        else{
            $answer->answers = $request->answer;
        }
        $answer->save();
        
        return 1;
    }

    public function orderList()
    {
        $orderList = Payment::leftjoin('packages','packages.id','=','payments.package_id')->where('user_id',Auth::user()->id)->orderBy('payments.id','DESC')->get();
        return view('user.orderList',compact('orderList'));
    }

    public function profile()
    {
        $address = Address::where('user_id',Auth::user()->id)->get();
        return view('user.profile',compact('address'));
    }

    public function contactInfo(Request $request){
        // dd($request->username);
        $data = [
            'name'=>$request->username,
            'email'=>$request->email,
            'phone_no'=>$request->phone_no,
        ];
        
        $user = User::where('id',$request->user_id)->update($data);
        if($user){
            Alert::success('Updated','Contact Information Updated !');
        }else{
            Alert::error('Sorry','Please try again later !');

        }
        return back();
    }

    public function addAddress(Request $request){
    // dd($request->all());

    if (!empty($request->address_id)) {
        $address =  Address::find($request->address_id);
        $address->address = $request->address ;
        $address->locality = $request->locality ;
        $address->city = $request->city ;
        $address->state = $request->state ;
        $address->country = $request->country ;
        $address->pin = $request->pin ;
        $address->save();
        Alert::success('Success', 'Address Updated  !');
    } else {
    
        $address = new Address();
        $address->user_id = Auth::user()->id;
        $address->address = $request->address ;
        $address->locality = $request->locality ;
        $address->city = $request->city ;
        $address->state = $request->state ;
        $address->country = $request->country ;
        $address->pin = $request->pin ;
        $address->save();
        Alert::success('Success', 'Address added  !');
    }
        return back();
    }

    public function deleteAddress(Request $request){
        // dd($request->al());
        $delete = Address::find($request->id);
        $delete->delete();
        return back();
    }


    public function defaultAddress(Request $request){
        $change = Address::where('user_id',Auth::user()->id)->update(['is_default'=>'0']);
        $default = Address::find($request->id);
        $default->is_default = '1';
        $default->save();
        return back();
    }


    public function editAddress(Request $request){
        $default = Address::where('id',$request->id)->first();
        return $default;
    }


    


}
