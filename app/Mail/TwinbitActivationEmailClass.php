<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class TwinbitActivationEmailClass extends Mailable
{
    use Queueable, SerializesModels;

    public $emailDetails;

    public function __construct($details)
    {
        $this->emailDetails = $details;
    }


    public function build()
    {
//        return $this->view('view.name');
        return $this->subject('Twinbit account activation')->view('emails.activeAccount');

    }
}
