<?php

namespace App\Http\Controllers;

use App\Mail\ContactMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use RealRashid\SweetAlert\Facades\Alert;

class MailController extends Controller
{
    public function sendMail()
    {
        $details = [
            'title' => 'Mail from shakil',
            'body' => 'This is a test mail from shakil'
        ];

        Mail::to('shakilbluehorse@gmail.com')->send( new ContactMail($details));
        Alert::success('Success','Mail send !');
        return back();
    }
}
