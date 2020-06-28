<?php

namespace App\Traits;

use App\Mail\DownloadManual;
use App\Mail\SuccessPayment;
use Illuminate\Http\Request;
use App\Mail\WithoutSessions;
use App\Mail\FinishedSessions;
use Illuminate\Support\Facades\Mail;


/**
 * 
 */
trait SendEmailsTrait
{
    
    public function successPayment($email)
    {
        Mail::to($email)->send(new SuccessPayment);
        
    }

    public function downloadManual($email)
    {
        Mail::to($email)->send(new DownloadManual);
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

