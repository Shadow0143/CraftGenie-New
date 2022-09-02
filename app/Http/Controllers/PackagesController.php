<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\CMS;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\Blog;
use App\Models\Package;

class PackagesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function packagesList(){
        $packages = Package::orderBy('id','desc')->get();
        return view('admin.packages.packageList',compact('packages'));
    }

    public function addPackages()
    {
        return view('admin.packages.addPackages');
    }

    public function submitPackages(Request $request)
    {
        // dd($request->all());
        if(!empty($request->id)){
            $cms =  Package::find($request->id);
            $cms->title = $request->title;
            $cms->description = $request->package_description;
            if (!empty($request->file('package_image'))) {
                $packages = $request->file('package_image');
                $packagephoto = 'package-image-' . rand(000, 999) . '.' .
                    $packages->getClientOriginalExtension();
                $result = public_path('packages');
                $packages->move($result, $packagephoto);
                $cms->image  = $packagephoto;
            }
            $cms->status = $request->changestatus;
            $cms->save();
            Alert::success('Success', 'Blog updated !');
        }else{
            $validated = $request->validate([
                'title' => 'required',
                'package_image' => 'required',
            ]);
            $cms = new Package();
            $cms->title = $request->title;
            $cms->description = $request->package_description;
            if (!empty($request->file('package_image'))) {
                $packages = $request->file('package_image');
                $packagephoto = 'package-image-' . rand(000, 999) . '.' .
                    $packages->getClientOriginalExtension();
                $result = public_path('packages');
                $packages->move($result, $packagephoto);
                $cms->image  = $packagephoto;
            }
            $cms->save();
            Alert::success('Success', 'Package added !');
        }
        
        return redirect()->route('packagesList');
    }

    public function deletePackages(Request $request)
    {
        $delete = Package::find($request->id);
        $delete->delete();
    }

    public function editPackages($id)
    {
        $pakage = Package::where('id',$id)->first();
        return view('admin.packages.addPackages')->with('cms',$pakage);
    }
}
