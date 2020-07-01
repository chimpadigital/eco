<?php

namespace App\Mail;

use App\Models\Quote;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class SesionesReserved extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    protected $quote;
    public function __construct(Quote$quote)
    {
        $this->quote = $quote;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Sesiones de asistencia virtual registradas')->markdown('emails.sessionesReserved')
        ->with([
            'first_session' => $this->quote->first_session,
            'second_session' => $this->quote->second_session,
        ]);;
    }
}
