<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ContactMailable extends Mailable
{
    use Queueable, SerializesModels;

	public $messageFrom;
	public $nameFrom;
	public $messageSubject;
	public $messageText;
//	public $attachment;

	/**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data)
    {
		$this->messageFrom = $data['from'];
		if (isset($data['name'])) {
			$this->nameFrom = $data['name'];
		}
		if (isset($data['subject'])) {
			$this->messageSubject = $data['subject'];
		}
		$this->messageText = $data['message'];
//		if (isset($data['attachment'])) {
//			$this->attachment = $data['attachment'];
//		}
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from($this->messageFrom, $this->nameFrom)
			->subject($this->messageSubject)
			->view('emails.contact');
    }
}
