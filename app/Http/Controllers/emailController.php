<?php

namespace App\Http\Controllers;

use App\Jobs\SendEmailJob;
use Illuminate\Http\Request;
use Mockery\Exception;

class emailController extends Controller
{
    public function send(Request $request)
    {

        $re = $request->validate([
            'emails' => 'required|array',
            'subject'  => 'required',
            'body' => 'required'
        ]);

            SendEmailJob::dispatch($re);

    }

}
