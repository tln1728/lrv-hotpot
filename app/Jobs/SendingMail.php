<?php

namespace App\Jobs;

use App\Mail\SendEmail;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class SendingMail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $to;
    protected $cc;
    protected $bcc;
    protected $subject;
    protected $content;
    protected $user;

    /**
     * Create a new job instance.
     */
    public function __construct($to, $cc, $bcc, $subject, $content, $user)
    {
        $this->to = $to;
        $this->cc = $cc;
        $this->bcc = $bcc;
        $this->subject = $subject;
        $this->content = $content;
        $this->user = $user;
    }

    /**
     * Execute the job.
     */
    public function handle()
    {
        Mail::to($this->to)
            ->cc($this->cc)
            ->bcc($this->bcc)
            ->queue(new SendEmail(
                $this->user,
                $this->subject,
                $this->content
            ));
    }
}
