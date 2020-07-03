<?php

namespace App\Traits;

use App\Mail\DownloadManual;
use App\Mail\SuccessPayment;
use Illuminate\Http\Request;
use App\Mail\WithoutSessions;
use App\Mail\FinishedSessions;
use App\Mail\SesionesReserved;
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

    public function withoutSessions($email)
    {
        Mail::to($email)->send(new WithoutSessions);
        return 'success';
        
    }

    public function finishedSessions($email)
    {
        Mail::to($email)->send(new FinishedSessions);
        return 'success';
    }

    public function sesionesReserved($email,$dates)
    {
        Mail::to($email)->send(new SesionesReserved($dates));
        return 'success';

    }

}

