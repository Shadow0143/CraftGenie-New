<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\CMS;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\Blog;
use App\Models\Package;
use App\Models\Questions;
use App\Models\SolutionFiles;
use App\Models\Solutions;

class SolutionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function solutionList(){
        $solutions = Solutions::select('packages.*','solutions.id as sid','solutions.remarks')->leftjoin('packages','packages.id','=','solutions.package_id')->get();
        foreach($solutions as $key=>$val){
            $files = SolutionFiles::where('solution_id',$val->sid)->get();
            $solutions[$key]->file = $files;
        }
        // dd($solutions);
        return view('admin.solution.solutionList',compact('solutions'));
    }

    public function addSolution()
    {
        $packages = Package::where('status','YES')->get();
        return view('admin.solution.addSolution',compact('packages'));
    }

    public function submitSolution(Request $request)
    {
        // dd($request->all());
        if(!empty($request->id)){
            $cms =  Questions::find($request->id);
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
                'remarks' => 'required',
                'document' => 'required',
            ]);

            $cms = new Solutions();
            $cms->payment_id = $request->payment_id;
            $cms->remarks = $request->remarks;
            $cms->save();

            if (!empty($request->file('document'))) {
                $extra_files = $request->file('document');
                $extraFiles = 'Solution-' . rand(000, 999) . '.' .
                    $extra_files->getClientOriginalExtension();
                $result = public_path('extra_files');
                $extra_files->move($result, $extraFiles);
                $postimage = new SolutionFiles();
                $postimage->solution_id	 = $cms->id;
                $postimage->file = $extraFiles;
                $extension =  $extra_files->getClientOriginalExtension();
                $postimage->extension  = $extension;
                $postimage->save();
            }



            Alert::success('Success','Solution Added ');

        }
        
        return back();
    }

    public function deleteSolution(Request $request)
    {
        $delete = Questions::find($request->id);
        $delete->delete();
    }

    public function editSolution($id)
    {
        $pakage = Questions::where('id',$id)->first();
        return view('admin.question.addPackages')->with('cms',$pakage);
    }
}
