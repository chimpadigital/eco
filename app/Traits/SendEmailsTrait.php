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
trait SendEmails
{
    
    public function successPayment()
    {
        Mail::to('devsignhost@gmail.com')->send(new SuccessPayment);
        
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

