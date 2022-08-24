<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CMS;
use App\Models\Blog;
use App\Models\Testimonial;

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
}
