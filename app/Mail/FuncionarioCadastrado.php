<?php

namespace App\Mail;

use App\Models\Funcionario;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Mail\Mailables\Attachment;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class FuncionarioCadastrado extends Mailable {
    use Queueable, SerializesModels;

    public function __construct(public Funcionario $funcionario) {
        
    }

    public function envelope(): Envelope {
        return new Envelope(
            from: new Address('admin@batata.com', 'XXXXX'),
            subject: '[🆕 XXXXX 🆕] Novo Funcionário Cadastrado 🙋🏻‍♂️',
        );
    }

    public function content(): Content {
        return new Content(
            view: 'emails/funcionarioCadastrado', // nome da view
        );
    }

    public function attachments(): array {
        return [
            // Attachment::fromStorage('pdf_sample_2.pdf') // anexa um arquivo do storage
        ];
    }
}
