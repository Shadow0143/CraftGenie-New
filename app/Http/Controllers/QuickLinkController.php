<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Auth;
use App\Models\QuickLinks;
use App\Models\Work;
use App\Models\Policies;

class QuickLinkController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function quickLinksList()
    {
        $faqs = QuickLinks::where('type', 'faqs')->get();
        return view('admin.quicklinks.quickLinksList', compact('faqs'));
    }

    public function addQuicklinks()
    {
        return view('admin.quicklinks.addQuicklinks');
    }

    public function submitQuicklinks(Request $request)
    {
        // dd($request->all());
        if (!empty($request->id)) {

            $links = QuickLinks::find($request->id);
            $links->type = $request->type;
            $links->title = $request->title;
            $links->description = $request->package_description;
            $links->save();
            Alert::success('Success ', 'Updated succesfully');
            return redirect()->route('quickLinksList');
        } else {
            $links  = new QuickLinks();
            $links->type = $request->type;
            $links->title = $request->title;
            $links->description = $request->package_description;
            $links->save();
            Alert::success('Success', 'Inserted succesfully');
            return back();
        }
    }

    public function editQuicklinks($id)
    {
        $faq = QuickLinks::find($id);
        return view('admin.quicklinks.addQuicklinks', compact('faq'));
    }

    public function deleteQuicklinks(Request $request)
    {
        $delete = QuickLinks::find($request->id);
        $delete->delete();
    }

    public function ourWorkList()
    {
        $works = Work::get();
        return view('admin.ourworks.ourWorkList', compact('works'));
    }

    public function addOurWork()
    {
        return view('admin.ourworks.addOurWork');
    }

    public function submitOurWork(Request $request)
    {
        // dd($request->all());
        if (!empty($request->id)) {
            $work =  Work::find($request->id);
            $work->title = $request->title;
            $work->description = $request->description;
            $work->status = $request->changestatus;
            if (!empty($request->file('package_image'))) {
                $packages = $request->file('package_image');
                $packagephoto = 'work-image-' . rand(000, 999) . '.' .
                    $packages->getClientOriginalExtension();
                $result = public_path('extra_files');
                $packages->move($result, $packagephoto);
                $work->image  = $packagephoto;
            }

            $work->save();
            Alert::success('Success', 'Work is updated');
            return redirect()->route('ourWorkList');
        } else {
            $validated = $request->validate([
                'title' => 'required',
                'package_image' => 'required',
                'description' => 'required',
            ]);

            $work = new Work();
            $work->title = $request->title;
            $work->description = $request->description;
            $work->status = $request->changestatus;
            if (!empty($request->file('package_image'))) {
                $packages = $request->file('package_image');
                $packagephoto = 'work-image-' . rand(000, 999) . '.' .
                    $packages->getClientOriginalExtension();
                $result = public_path('extra_files');
                $packages->move($result, $packagephoto);
                $work->image  = $packagephoto;
            }

            $work->save();
            Alert::success('Success', 'Work is added');
            return back();
        }
    }

    public function editOurWork($id)
    {
        $work = Work::find($id);
        return view('admin.ourworks.addOurWork', compact('work'));
    }

    public function deleteOurWork(Request $request)
    {
        $delete = Work::find($request->id);
        $delete->delete();
    }



    public function bookingPolicieList()
    {
        $booking_policie = Policies::where('type', 'booking-policie')->get();
        return view('admin.policies.bookingpolicie', compact('booking_policie'));
    }
    public function refundPolicieList()
    {
        $refund_policie = Policies::where('type', 'refund-policie')->get();
        return view('admin.policies.refundPolicy', compact('refund_policie'));
    }
    public function termConditionsList()
    {
        $termCondition = Policies::where('type', 'term-condition')->get();
        return view('admin.policies.termCondition', compact('termCondition'));
    }
    public function addPolicies($s)
    {
        $type = $s;
        return view('admin.policies.addPolicies', compact('type'));
    }
    public function submitPolicies(Request $request)
    {
        // dd($request->all());
        if (!empty($request->id)) {
            $policies = Policies::find($request->id);
            $policies->title = $request->title;
            $policies->subtitle = $request->subtitle;
            $policies->description = $request->description;
            $policies->status = $request->changestatus;
            $policies->save();

            Alert::success('Success', 'Policie updated. ');
        } else {
            $policies = new Policies();
            $policies->type = $request->policie_type;
            $policies->title = $request->title;
            $policies->subtitle = $request->subtitle;
            $policies->description = $request->description;
            $policies->status = $request->changestatus;
            $policies->save();

            Alert::success('Success', 'Policie added. ');
        }
        return back();
    }

    public function deletePolicies(Request $request)
    {
        $delete = Policies::find($request->id);
        $delete->delete();
    }

    public function editPolicies($id)
    {
        $policy = Policies::find($id);
        return view('admin.policies.addPolicies', compact('policy'));
    }
}
