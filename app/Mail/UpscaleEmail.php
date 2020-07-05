<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class UpscaleEmail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        // return $this->from('dodi@upscale.id')
        //     ->view('sendmail')
        //     ->attach(public_path(
        //         'COMPANY PROFILE.pdf',
        //         [
        //             'mime' => 'application/pdf'
        //         ]
        //     ));

        return $this->from('hrd@upscale.id')->view('mail.invitation');
    }
}
