<?php

namespace App\Http\Controllers;

use App\Jobs\SendingMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MailController extends Controller
{
    public function index() {
        return view('emails.index');
    }

    public function sendMail(Request $request) {
        $data = $request -> validate([
            'to'        => 'required|string',
            'cc'        => 'nullable',
            'bcc'       => 'nullable',
            'subject'   => 'required|string',
            'content'   => 'required|string',
        ]);

        $cc  = array_filter(array_map('trim', explode(',',$data['cc'])));
        $bcc  = array_filter(array_map('trim', explode(',',$data['bcc'])));

        SendingMail::dispatch(
            $data['to'], 
            $cc, 
            $bcc, 
            $data['subject'], 
            $data['content'],
            Auth::user(),
        );

        return redirect() -> back() -> with([
            'success' => 'Your email is being delivered',
            'error'   => 'lỗi queue chưa fix',
        ]);
    }
}
