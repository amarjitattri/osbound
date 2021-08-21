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
        $email = $this->from($this->jobemail->from)
                    ->markdown('emails.enquiries.contact', [
                                                            'jobemail' => $this->jobemail,
                    ]);

        if($this->jobemail->attachments)
        {
            if(@$this->jobemail->attachments['photography_auth_form'])
            {
                $email->attach($this->jobemail->attachments['photography_auth_form']);
            }
            if(@$this->jobemail->attachments['terms_and_conditions'])
            {
                $email->attach($this->jobemail->attachments['terms_and_conditions']);
            }
            if(@$this->jobemail->attachments['image_gallery'])
            {
                foreach($this->jobemail->attachments['image_gallery'] as $i=>$image) {
                    $email->attach(public_path($image));
                }
            }
        }

        // dd($email);
        return $email;
    }
}
