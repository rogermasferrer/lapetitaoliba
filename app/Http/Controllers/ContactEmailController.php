<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\MailgunTest;

class ContactEmailController extends Controller
{
    public function add() {
		return view('contact');
	}

	public function send(Request $request) {
        $request->validate([
            'from' => 'required|email',
			'name' => 'nullable|alpha_dash',
            'message' => 'required|string',
            'attachment' => 'nullable|file|max:2048'
        ]);		
		Mail::to('contacte@botiga.lapetitaoliba.com')->send(new MailgunTest());
		return redirect('contact')->with('success', 'email sent');
	}
}

