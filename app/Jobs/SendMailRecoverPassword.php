<?php

namespace App\Jobs;

use App\Mail\RecoverPassword;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class SendMailRecoverPassword implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(
        private string $email,
        private string $name,
        private string $actionLink,
    )
    {
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle(): void
    {
        try {
            $email = new RecoverPassword($this->name, $this->actionLink);
            Mail::to($this->email)->send($email);
        }catch (\Exception $exception) {
            Log::error('Error job recover password', [
                'method' => __METHOD__,
                'message' => $exception->getMessage()
            ]);
        }
    }
}
