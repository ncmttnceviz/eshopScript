<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class mailController extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */

    public $user;
    public $subject;
    public $view;
    public $data;

    public function __construct($to,$subject,$view,$data)
    {
        $this->user = $to;
        $this->subject = $subject;
        $this->view = $view;
        $this->data = $data;

    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from(env('MAIL_FROM_ADDRESS'))
            ->to($this->user)
            ->with($this->data)
            ->view($this->view);

    }
}
