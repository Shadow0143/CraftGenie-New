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



class WelcomeController extends Controller
{
    public function welcome()
    {
        $cms = CMS::where('status','1')->orderBy('id','desc')->get();
        $blogs = Blog::where('status',1)->orderBy('id','desc')->get();
        $testimonial = Testimonial::where('status',1)->orderBy('id','desc')->get();
        return view('welcome')->with('cms',$cms)->with('blog',$blogs)->with('testimonial',$testimonial);
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


}
