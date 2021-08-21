<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

use App\Models\JobEmail;

class JobEmailer extends Mailable
{
    use Queueable, SerializesModels;

    public $jobemail;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(JobEmail $jobemail)
    {
        $this->jobemail = $jobemail;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from($this->jobemail->from)
                    ->markdown('emails.enquiries.contact', [
                                                            'jobemail' => $this->jobemail,
                                                        ]);
    }
}
