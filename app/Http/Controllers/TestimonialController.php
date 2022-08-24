<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\CMS;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\Blog;
use App\Models\Testimonial;

class TestimonialController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function testimonialList(){
        $cms = Testimonial::where('created_by',Auth::user()->id)->orderBy('id','desc')->get();
        return view('admin.testimonial.testimonialList',compact('cms'));
    }

    public function addTestimonial()
    {
        return view(('admin.testimonial.addTestimonial'));
    }

    public function submitTestimonial(Request $request)
    {
        if(!empty($request->id)){
            $users =  Testimonial::find($request->id);
            $users->user_name = $request->name;
            $users->user_designation = $request->designation;
            $users->user_say = $request->user_say;
            if (!empty($request->file('user_image'))) {
                $testimonial = $request->file('user_image');
                $testimonialphoto = 'testinonial-' . rand(000, 999) . '.' .
                $testimonial->getClientOriginalExtension();
                $result = public_path('testimonial');
                $testimonial->move($result, $testimonialphoto);
                $users->image  = $testimonialphoto;
            }
            $users->status = $request->changestatus;
            $users->save();
            Alert::success('Success', 'Testimonial updated !');
        }else{

            $validated = $request->validate([
                'name' => 'required',
                'designation' => 'required',
                'blog' => 'required',
                'user_image' => 'required',
                'user_say' => 'required',
            ]);
            $users = new Testimonial();
            $users->created_by = Auth::user()->id;
            $users->user_name = $request->name;
            $users->user_designation = $request->designation;
            $users->user_say = $request->user_say;
            if (!empty($request->file('user_image'))) {
                $testimonial = $request->file('user_image');
                $testimonialphoto = 'testinonial-' . rand(000, 999) . '.' .
                $testimonial->getClientOriginalExtension();
                $result = public_path('testimonial');
                $testimonial->move($result, $testimonialphoto);
                $users->image  = $testimonialphoto;
            }
            $users->status = '1';
            $users->save();
            Alert::success('Success', 'Testimonial added !');
        }
        
        return redirect()->route('testimonialList');
    }

    public function editTestimonial($id)
    {
        $cms = Testimonial::where('id',$id)->first();
        return view('admin.testimonial.addTestimonial',compact('cms'));
    }

    public function deleteTestimonial(Request $request){
        $delete = Testimonial::find($request->id);
        $delete->delete();
    }

}
