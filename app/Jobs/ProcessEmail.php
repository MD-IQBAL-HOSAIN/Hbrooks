<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Support\Facades\Mail;
use App\Mail\YourMailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class ProcessEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    protected $emailData;

    //Create a new job instance.
    public function __construct($emailData)
    {
        $this->emailData = $emailData;
    }


    public function handle(): void
{
    // Send email to the specified recipient
    Mail::to($this->emailData['recipient'])->send(new YourMailable($this->emailData));
}

}
