<?php

namespace App\Mail;

use App\Models\Permohonan;
use App\Models\Agensi;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class PermohonanLulus extends Mailable
{
    use Queueable, SerializesModels;
    protected $permohonan;
    protected $agensi;


    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Permohonan $permohonan, Agensi $agensi)
    {
        $this->permohonan = $permohonan;
        $this->agensi = $agensi;



    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.pendaftaran_lulus')
        ->subject('RISDA | e-LATIHAN - Permohonan diluluskan')
        ->with([
            'permohonan'=> $this->permohonan,
            'agensi'=> $this->agensi

        ]);
    }
}
