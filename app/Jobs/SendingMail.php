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

    /**
     * The number of times the job may be attempted.
     *
     * @var int
     */
    public $tries = 3;
    public $maxExceptions = 3;
    public $timeout = 30;
    public $failOnTimeout = true;

    protected $to;
    protected $cc;
    protected $bcc;
    protected $subject;
    protected $content;
    protected $user;

    /**
     * Create a new job instance.
     */
    public function __construct($to, $cc = null, $bcc = null, $subject, $content, $user)
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
    /**
     * The job failed to process.
     *
     * @param  Exception  $exception
     * @return void
     */
    public function failed(\Throwable $exception) {}

    /**
     * Calculate the number of seconds to wait before retrying the job.
     *
     * @return array
     */
    public function backoff()
    {
        return [1, 5, 10];
    }
}
