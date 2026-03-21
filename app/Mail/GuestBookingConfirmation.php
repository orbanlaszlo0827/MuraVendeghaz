<?php

namespace App\Mail;

use App\Models\Booking;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class GuestBookingConfirmation extends Mailable
{
    use Queueable, SerializesModels;

    // Ezt az adatot adjuk át a levélnek
    public function __construct(public Booking $booking) {}

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Sikeres foglalás - Mura Vendégház',
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.guest_confirmation', // Ezt a HTML-t fogjuk megírni
        );
    }
}