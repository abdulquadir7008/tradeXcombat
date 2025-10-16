<?php

namespace App\Notifications;
use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Support\Facades\URL;
use Carbon\Carbon;

class VerifyEmailNotification extends Notification
{
    public function via($notifiable)
    {
        return ['mail'];
    }

    public function toMail($notifiable)
    {
        $verifyUrl = URL::temporarySignedRoute(
            'verify.email',
            Carbon::now()->addMinutes(60),
            ['id' => $notifiable->id, 'email' => $notifiable->email]
        );

        return (new MailMessage)
            ->subject('Verify Your Email')
            ->line('Click the button below to verify your email address.')
            ->action('Verify Email', $verifyUrl)
            ->line('This link will expire in 60 minutes.');
    }
}
