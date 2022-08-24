<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\CMS;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\Blog;

class BlogController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function blogList(){
        $blogs = Blog::where('created_by',Auth::user()->id)->orderBy('id','desc')->get();
        return view('admin.blog.blogList',compact('blogs'));
    }

    public function addBlog()
    {
       
        return view('admin.blog.addBlog');
    }

    public function submitBlog(Request $request)
    {
        if(!empty($request->id)){
            $cms =  Blog::find($request->id);
            $cms->title = $request->title;
            $cms->subtitle = $request->subtitle;
            $cms->description = $request->blog_description;
            if (!empty($request->file('blog'))) {
                $blogs = $request->file('blog');
                $blogphoto = 'blog-' . rand(000, 999) . '.' .
                    $blogs->getClientOriginalExtension();
                $result = public_path('blogs');
                $blogs->move($result, $blogphoto);
                $cms->image  = $blogphoto;
            }
            $cms->status = $request->changestatus;
            $cms->save();
            Alert::success('Success', 'Blog updated !');
        }else{
            $validated = $request->validate([
                'title' => 'required',
                'subtitle' => 'required',
                'blog' => 'required',
            ]);
            $cms = new Blog();
            $cms->created_by = Auth::user()->id;
            $cms->type = 'blog';
            $cms->title = $request->title;
            $cms->subtitle = $request->subtitle;
            $cms->description = $request->blog_description;
            if (!empty($request->file('blog'))) {
                $blogs = $request->file('blog');
                $blogphoto = 'blog-' . rand(000, 999) . '.' .
                    $blogs->getClientOriginalExtension();
                $result = public_path('blogs');
                $blogs->move($result, $blogphoto);
                $cms->image  = $blogphoto;
            }
            $cms->status = '1';
            $cms->save();
            Alert::success('Success', 'Blog added !');
        }
        
        return redirect()->route('blogList');
    }

    public function deleteBlog(Request $request)
    {
        $delete = Blog::find($request->id);
        $delete->delete();
    }

    public function editBlog($id)
    {
        $blog = Blog::where('id',$id)->first();
        return view('admin.blog.addBlog')->with('cms',$blog);
    }
}
