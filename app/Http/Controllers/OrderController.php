<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\OrderMailable;
use App\Models\Product;

class OrderController extends Controller
{
    public function send(Request $request, $id) {
		$user = $request->user();
		$product = Product::find($id);
		$units = $request->units;
//		return new OrderMailable($product, $user);
        Mail::to('contacte@botiga.lapetitaoliba.cat')->send(new OrderMailable($product, $user, $units));
        return redirect()->back()->with('success', 'order email sent, we will com back to you with payment information');
	}
}
