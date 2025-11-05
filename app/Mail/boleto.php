<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class Boleto extends Mailable
{
    use Queueable, SerializesModels;

    public $pelicula;

    /**
     * Recibe la película y la pasa a la vista.
     */
    public function __construct($pelicula)
    {
        $this->pelicula = $pelicula;
    }

    /**
     * Asunto del correo.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: '🎬 Nueva Película: ' . $this->pelicula->nombre
        );
    }

    /**
     * Vista del contenido y variables compartidas.
     */
    public function content(): Content
    {
        return new Content(
            view: 'peliculaNotificacion', // Asegúrate que la vista esté en resources/views/emails/
            with: [
                'pelicula' => $this->pelicula
            ]
        );
    }

    /**
     * Si quieres adjuntar boletos PDF en un futuro.
     */
    public function attachments(): array
    {
        return [];
    }
}
