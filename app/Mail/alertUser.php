<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Models\usuarioModel;    

class alertUser extends Mailable
{
    use Queueable, SerializesModels;

   public $receptor;
    public function __construct(usuarioModel $receptor)
    {
         $this->receptor = $receptor;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('Usuarios.emailUser');
    }
}
