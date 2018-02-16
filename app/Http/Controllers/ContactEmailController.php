<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactMailable;

class ContactEmailController extends Controller
{
    public function add() {
		return view('contact');
	}

	public function send(Request $request) {
        $request->validate([
            'from' => 'required|email',
			'name' => 'nullable|alpha_dash',
			'subject' => 'nullable|string',
            'message' => 'required|string',
//            'attachment' => 'nullable|file|max:2048'
        ]);
		$data = $request->only(['from','message']);
		if ($request->has('name')) {
			$data['name'] = $request->name;
		}
		if ($request->has('subject')) {
			$data['subject'] = $request->subject;
		}
//		if ($request->hasFile('attachment')) {
//			$data['attachment'] = $request->attachment;
//		}
//		return new MailgunTest($data);
		Mail::to('contacte@botiga.lapetitaoliba.cat')->send(new ContactMailable($data));
		return redirect('contact')->with('success', 'email sent');
	}
}

