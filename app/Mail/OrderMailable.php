<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\User;
use App\Models\Product;

class OrderMailable extends Mailable
{
    use Queueable, SerializesModels;

	public $product;
	public $user;
	public $units;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Product $product, User $user, $units)
    {
        $this->product = $product;
		$this->user = $user;
		$this->units = $units;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from($this->user->email, $this->user->name)
			->subject('Nova comanda')
			->view('emails.order-email');
    }
}
