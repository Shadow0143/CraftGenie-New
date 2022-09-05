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
        // $answer->user_id = Auth::user()->id;
        $answer->user_id = '1';
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


}
