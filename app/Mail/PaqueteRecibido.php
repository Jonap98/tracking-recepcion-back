<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class PaqueteRecibido extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($all_recievers, $numero_de_guia, $usuario)
    {
        $this->all_recievers = $all_recievers;
        $this->numero_de_guia = $numero_de_guia;
        $this->usuario = $usuario;
    }

    /**
     * Get the message envelope.
     *
     * @return \Illuminate\Mail\Mailables\Envelope
     */
    public function envelope()
    {
        return new Envelope(
            subject: 'Paquete Recibido',
        );
    }

    /**
     * Get the message content definition.
     *
     * @return \Illuminate\Mail\Mailables\Content
     */
    public function content()
    {
        if($this->all_recievers == true) {
            return new Content(
                view: 'paqueteria.nuevo-paquete-vacio',
                with: [
                    'numero_de_guia' => $this->numero_de_guia,
                    'usuario' => $this->usuario
                ]
            );
        }
        return new Content(
            view: 'paqueteria.nuevo-paquete',
            with: [
                'numero_de_guia' => $this->numero_de_guia,
                'usuario' => $this->usuario,
            ]
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array
     */
    public function attachments()
    {
        return [];
    }

    // public function build() {
    //     if($this->all_recievers == true) {
    //         return $this
    //         // ->from('jonathanperez31415@gmail.com', 'Sistema Automatizado de Envio de Notificaciones')
    //         // ->subject('Nuevo paquete en recepción')
    //         ->view('paqueteria.nuevo-paquete-vacio', ['numero_de_guia' => $this->numero_de_guia]);
    //     }
    //     return $this
    //         ->view('paqueteria.nuevo-paquete', ['numero_de_guia' => $this->numero_de_guia]);
    // }
}
