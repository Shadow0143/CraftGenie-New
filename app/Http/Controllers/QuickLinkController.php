<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Auth;
use App\Models\QuickLinks;


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
}
