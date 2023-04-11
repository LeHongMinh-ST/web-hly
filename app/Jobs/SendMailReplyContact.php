<?php

namespace App\Jobs;

use App\Mail\ReplyContact;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class SendMailReplyContact implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(
        private string $email,
        private string $message,
    )
    {
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        try {
            $email = new ReplyContact($this->message);
            Mail::to($this->email)->send($email);
        }catch (\Exception $exception) {
            Log::error('Error job reply contact', [
                'method' => __METHOD__,
                'message' => $exception->getMessage()
            ]);
        }

    }
}
