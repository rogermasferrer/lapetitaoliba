<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class MailgunTest extends Mailable
{
    use Queueable, SerializesModels;

    public $messageFrom = 'postmaster@botiga.lapetitaoliba.cat';

	/**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct()
    {
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from($this->messageFrom)
			->view('emails.mailguntest');
    }
}
