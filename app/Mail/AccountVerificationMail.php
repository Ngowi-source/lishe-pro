<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class AccountVerificationMail extends Mailable
{
    use Queueable, SerializesModels;

    public $accountVer;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($accountVer)
    {
        $this->accountVer = $accountVer;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('hello@bryceandy.com')
            ->view('mails.accVer')
            ->text('mails.accVer_plain');
    }
}
