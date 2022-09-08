<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\CMS;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\Blog;
use App\Models\Package;
use App\Models\PackageExtraFiles;
use Faker\Provider\Image;

class PackagesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function packagesList(){
        $packages = Package::orderBy('packages.id','desc')->get();
            foreach($packages as $key=>$val){
                $files = PackageExtraFiles::where('package_id',$val->id)->get();
                $packages[$key]->file = $files;
            }
        // dd($packages);
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
            $cms->price = $request->price;
            if (!empty($request->file('package_image'))) {
                $packages = $request->file('package_image');
                $packagephoto = 'package-image-' . rand(000, 999) . '.' .
                    $packages->getClientOriginalExtension();
                $result = public_path('packages');
                $packages->move($result, $packagephoto);
                $cms->image  = $packagephoto;
            }
            if (!empty($request->file('extra_file'))) {
                $extra_files = $request->file('extra_file');
                $extraFiles = 'extra-file-' . rand(000, 999) . '.' .
                    $extra_files->getClientOriginalExtension();
                $result = public_path('extra_files');
                $extra_files->move($result, $extraFiles);
                $cms->extra_file  = $extraFiles;
                $extension =  $extra_files->getClientOriginalExtension();
                $cms->file_type  = $extension;

            }
            
            $cms->status = $request->changestatus;
            $cms->save();
            Alert::success('Success', 'Blog updated !');
        }else{
            $validated = $request->validate([
                'title' => 'required',
                'package_image' => 'required',
                'price' => 'required',
            ]);
            $cms = new Package();
            $cms->title = $request->title;
            $cms->description = $request->package_description;
            $cms->price = $request->price;
            if (!empty($request->file('package_image'))) {
                $packages = $request->file('package_image');
                $packagephoto = 'package-image-' . rand(000, 999) . '.' .
                    $packages->getClientOriginalExtension();
                $result = public_path('packages');
                $packages->move($result, $packagephoto);
                $cms->image  = $packagephoto;
            }

            $cms->save();


            $postImagearry = $request->extra_file;
            if(!empty($postImagearry)){
                for ($k = 0; $k < count($postImagearry); $k++) {
                        $input['imagename'] ='package-'.Auth::user()->id. '-'.rand(000, 5000) . '.' . $postImagearry[$k]->getClientOriginalExtension();
                        $destinationPath_selected = public_path('/extra_files');
                        $postImagearry[$k]->move($destinationPath_selected,$input['imagename']);
                            $postimage = new PackageExtraFiles();
                            $postimage->package_id = $cms->id;
                            $postimage->file_name = $input['imagename'];
                            $extension =  $postImagearry[$k]->getClientOriginalExtension();
                            $postimage->extension  = $extension;
                            $postimage->save();
                    }
            }

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
