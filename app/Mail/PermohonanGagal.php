<?php

namespace App\Mail;

use App\Models\Permohonan;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class PermohonanGagal extends Mailable
{
    use Queueable, SerializesModels;
    protected $permohonan;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Permohonan $permohonan)
    {
        $this->permohonan = $permohonan;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.pendaftaran_gagal')
        ->subject('RISDA | e-LATIHAN - Permohonan Gagal')
        ->with([
            'permohonan'=> $this->permohonan
        ]);
    }
}
