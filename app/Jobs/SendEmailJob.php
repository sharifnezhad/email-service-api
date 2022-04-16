<?php

namespace App\Jobs;

use \Illuminate\Http\Request;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use \App\Mail\MailTemplate;
use Mockery\Exception;
use Rap2hpoutre\LaravelLogViewer\LogViewerController;

class SendEmailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * @var Request
     */
    private $request;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($request)
    {
        $this->request = $request;
    }


    public function handle()
    {
        try {
            Mail::to($this->request['emails'])->send(new MailTemplate($this->request['subject'], $this->request['body']));
            for ($i = 0; $i < count($this->request['emails']); $i++) {
                Log::info('The message was sent to ' . $this->request['emails'][$i]);
            }
        } catch (Exception $e) {
            Log::info('error: ' . $e->getMessage());
        }
    }
}
