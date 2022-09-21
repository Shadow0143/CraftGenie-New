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
use App\Models\PackageExtraFiles;
use App\Models\Solutions;
use App\Models\Chat;
use App\Models\QuickLinks;
use App\Models\Work;
use App\Models\Policies;

class WelcomeController extends Controller
{
    public function welcome()
    {
        $cms = CMS::where('status', '1')->orderBy('id', 'desc')->get();
        $blogs = Blog::where('status', 1)->orderBy('id', 'desc')->get();
        $testimonial = Testimonial::where('status', 1)->orderBy('id', 'desc')->get();
        $package = Package::where('status', 'YES')->orderBy('sequence', 'asc')->get();
        foreach ($package as $key => $val) {
            $files = PackageExtraFiles::where('package_id', $val->id)->get();
            $package[$key]->file = $files;
        }
        $question = Questions::orderBy('sequence', 'ASC')->get();
        foreach ($question as $key => $val) {
            $values = explode("~ ", $val->values);
            $question[$key]->values = $values;
        }

        $works = Work::orderBy('id', 'asc')->get();


        return view('welcome')->with('cms', $cms)->with('blog', $blogs)->with('testimonial', $testimonial)->with('package', $package)->with('question', $question)->with('work', $works);
    }

    public function blogDetails($id)
    {
        $blog = Blog::where('id', $id)->first();
        return view('admin.blog.details', compact('blog'));
    }

    public function submitContact(Request $request)
    {

        // dd($request->all());
        // for user

        $userdetails = [
            'body' => 'Stay connect,stay save',
            'name' => $request->name,
        ];
        $to = $request->email;
        Mail::to($to)->send(new UserContactMail($userdetails));

        // for admin


        $contact = new ContactUs();
        $contact->user_name = $request->name;
        $contact->user_email = $request->email;
        $contact->contact_no = $request->contact;
        if (!empty($request->file('sharefile'))) {
            $contactfile = $request->file('sharefile');
            $filename = 'contact-share-' . rand(000, 999) . '.' .
                $contactfile->getClientOriginalExtension();
            $result = public_path('extra_files');
            $contactfile->move($result, $filename);
            $contact->shared_file  = $filename;
        }
        $contact->save();

        $details = [
            'title' => $request->name . ' ' . ' try to reach you',
            'useremail' => $request->email,
            'username' => $request->name,
            'contact' => $request->contact,
            'files'  => asset('extra_files' . '/' . $contact->shared_file),
        ];
        Mail::to('shakilbluehorse@gmail.com')->send(new ContactMail($details));
        Alert::success('Thank you for contact', 'We will contact you soon');
        return back();
    }

    public function questionaries()
    {
        $question = Questions::orderBy('sequence', 'ASC')->get();
        foreach ($question as $key => $val) {
            $values = explode(", ", $val->values);
            $question[$key]->values = $values;
        }
        return view('admin.question.question', compact('question'));
    }

    public function submitAnswer(Request $request)
    {
        // dd($request->all());
        $answer = new Answer();
        $answer->user_id = Auth::user()->id;
        $answer->question_id = $request->question_id;
        $answer->question_type = $request->question_type;
        $answer->package_id = $request->packageId;
        if ($request->question_type == 'checkbox') {
            $newvalue = implode(", ",  $request->checkBoxValue);
            $answer->answers = $newvalue;
        } else {
            $answer->answers = $request->answer;
        }
        $answer->save();

        return 1;
    }

    public function orderList()
    {
        $orderList = Payment::select('payments.*', 'packages.title')->leftjoin('packages', 'packages.id', '=', 'payments.package_id')->where('user_id', Auth::user()->id)->orderBy('payments.id', 'DESC')->get();

        foreach ($orderList as $key => $val) {
            $chatCount = Chat::where('payment_id', $val->id)->where('sender', '!=', Auth::user()->id)->where('status', 'unread')->count();
            $orderList[$key]->mssgCount = $chatCount;
        }
        return view('user.orderList', compact('orderList'));
    }

    public function profile()
    {
        $address = Address::where('user_id', Auth::user()->id)->get();
        return view('user.profile', compact('address'));
    }

    public function contactInfo(Request $request)
    {
        // dd($request->username);
        $data = [
            'name' => $request->username,
            'email' => $request->email,
            'phone_no' => $request->phone_no,
        ];

        $user = User::where('id', $request->user_id)->update($data);
        if ($user) {
            Alert::success('Updated', 'Contact Information Updated !');
        } else {
            Alert::error('Sorry', 'Please try again later !');
        }
        return back();
    }

    public function addAddress(Request $request)
    {
        // dd($request->all());

        if (!empty($request->address_id)) {
            $address =  Address::find($request->address_id);
            $address->address = $request->address;
            $address->locality = $request->locality;
            $address->city = $request->city;
            $address->state = $request->state;
            $address->country = $request->country;
            $address->pin = $request->pin;
            $address->save();
            Alert::success('Success', 'Address Updated  !');
        } else {

            $address = new Address();
            $address->user_id = Auth::user()->id;
            $address->address = $request->address;
            $address->locality = $request->locality;
            $address->city = $request->city;
            $address->state = $request->state;
            $address->country = $request->country;
            $address->pin = $request->pin;
            $address->save();
            Alert::success('Success', 'Address added  !');
        }
        return back();
    }

    public function deleteAddress(Request $request)
    {
        // dd($request->al());
        $delete = Address::find($request->id);
        $delete->delete();
        return back();
    }


    public function defaultAddress(Request $request)
    {
        $change = Address::where('user_id', Auth::user()->id)->update(['is_default' => '0']);
        $default = Address::find($request->id);
        $default->is_default = '1';
        $default->save();
        return back();
    }


    public function editAddress(Request $request)
    {
        $default = Address::where('id', $request->id)->first();
        return $default;
    }

    public function userOrderDetails($id)
    {
        // dd($id);
        $payments = Payment::select('transaction_no', 'packages.title', 'user_name', 'payments.amount as PaymentAmount', 'payments.id as paymentid', 'user_name', 'user_email', 'contact_no', 'address', 'is_pay', 'payment_date', 'package_id')->leftjoin('packages', 'packages.id', '=', 'payments.package_id')->where('payments.id', $id)->orderBy('paymentid', 'desc')->first();

        $chatCount = Chat::where('payment_id', $payments->paymentid)->where('sender', '!=', Auth::user()->id)->where('status', 'unread')->update(['status' => 'read']);



        $solution = Solutions::leftjoin('solutions_files', 'solutions_files.solution_id', '=', 'solutions.id')->where('payment_id', $id)->first();

        $payment_pkg = Payment::select('user_id', 'package_id')->where('id', $id)->first();
        $answer = Answer::leftjoin('questions', 'questions.id', '=', 'answers.question_id')->where('user_id', $payment_pkg->user_id)->where('package_id', $payment_pkg->package_id)->get();

        $chats = Chat::select('chats.*', 'users.name', 'users.id as uid')->leftjoin('users', 'users.id', '=', 'chats.sender')->where('payment_id', $id)->get();






        return view('user.userOrderDetails', compact('payments', 'solution', 'answer', 'chats'));
    }

    public function faq()
    {
        $faqs = QuickLinks::where('type', 'faqs')->get();
        return view('user.faq', compact('faqs'));
    }

    public function bookPol()
    {
        $policy = Policies::where('status', '1')->where('type', 'booking-policie')->get();
        return view('user.booking_policy', compact('policy'));
    }
    public function refunPoly()
    {
        $policy = Policies::where('status', '1')->where('type', 'refund-policie')->get();

        return view('user.refund_policy', compact('policy'));
    }
    public function termCond()
    {
        $policy = Policies::where('status', '1')->where('type', 'term-condition')->get();

        return view('user.term_condition', compact('policy'));
    }


    public function packageDetails(Request $request)
    {

        $package = Package::where('id', $request->id)->first();
        // dd($request->id, $package);
        return $package;
    }
}