<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CMS;

class WelcomeController extends Controller
{
    public function welcome()
    {
        $cms = CMS::where('status','1')->get();
        return view('welcome')->with('cms',$cms);
    }
}
