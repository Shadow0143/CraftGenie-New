<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\CMS;
use App\Models\ContactUs;
use RealRashid\SweetAlert\Facades\Alert;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function bannerList()
    {
        $cms = CMS::where('type', 'banner')->where('created_by',Auth::user()->id)->orderBy('id', 'desc')->get();
        return view('admin.banner.bannerlist', compact('cms'));
    }

    public function addBanner()
    {

        return view('admin.banner.addBanner');
    }

    public function submitBanner(Request $request)
    {
        if(!empty($request->id)){
            $cms =  CMS::find($request->id);
            $cms->title = $request->title;
            $cms->subtitle = $request->subtitle;
            if (!empty($request->file('banner'))) {
                $banner = $request->file('banner');
                $bannerphoto = 'banner-logo-' . rand(000, 999) . '.' .
                    $banner->getClientOriginalExtension();
                $result = public_path('banners');
                $banner->move($result, $bannerphoto);
                $cms->image  = $bannerphoto;
            }
            $cms->status = $request->changestatus;
            $cms->save();
            Alert::success('Success', 'Banner updated !');
        }else{
            $validated = $request->validate([
                'title' => 'required',
                'subtitle' => 'required',
                'banner' => 'required',
            ]);
            $cms = new CMS();
            $cms->created_by = Auth::user()->id;
            $cms->type = 'banner';
            $cms->title = $request->title;
            $cms->subtitle = $request->subtitle;
            if (!empty($request->file('banner'))) {
                $banner = $request->file('banner');
                $bannerphoto = 'banner-logo-' . rand(000, 999) . '.' .
                    $banner->getClientOriginalExtension();
                $result = public_path('banners');
                $banner->move($result, $bannerphoto);
                $cms->image  = $bannerphoto;
            }
            $cms->status = '1';
            $cms->save();
            Alert::success('Success', 'Banner added !');
        }
        
        return redirect()->route('bannerList');
    }

    public function deleteBanner(Request $request){
        $cms = CMS::find($request->id);
        $cms->delete();
    }

    public function editBanner($id)
    {
        $cms = CMS::where('id',$id)->first();
        return view('admin.banner.addBanner',compact('cms'));
    }

    public function contactList(){
        $all_contact = ContactUs::get();
        return view('admin.contact.contact',compact('all_contact'));
    }

    public function deleteContact(Request $request){
        $delete = ContactUs::where('id',$request->id)->delete();
    }

}
