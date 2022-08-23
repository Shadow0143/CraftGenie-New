<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\CMS;
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
        return redirect()->route('bannerList');
    }


}