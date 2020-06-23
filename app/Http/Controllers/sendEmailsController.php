<?php

namespace App\Http\Controllers;

use App\Mail\DownloadManual;
use App\Mail\SuccessPayment;
use Illuminate\Http\Request;
use App\Mail\WithoutSessions;
use App\Mail\FinishedSessions;
use Illuminate\Support\Facades\Mail;

class sendEmailsController extends Controller
{
    public function successPayment()
    {
        Mail::to('devsignhost@gmail.com')->send(new SuccessPayment);
        return 'success';
        
    }

    public function downloadManual()
    {
        Mail::to('devsignhost@gmail.com')->send(new DownloadManual);
        return 'success';
        
    }

    public function withoutSessions()
    {
        Mail::to('devsignhost@gmail.com')->send(new WithoutSessions);
        return 'success';
        
    }

    public function finishedSessions()
    {
        Mail::to('devsignhost@gmail.com')->send(new FinishedSessions);
        return 'success';
    }
}
