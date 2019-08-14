<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Resume;
use App\Post;

use Illuminate\Support\Facades\View;
class CandidatureMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $resume;
    public $post;
    public function __construct(Resume $resume, Post $post)
    {
        $this->resume = $resume;
        $this->post = $post;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {      return \View::make('emails.candidatureMail');
      //  return $this->view('emails.candidatureMail');
    }
}
