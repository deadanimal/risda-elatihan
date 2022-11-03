<?php

namespace App\Notifications;

use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ResetPasswordNotification extends Notification
{
    public $token;

    public function __construct($token)
    {
        $this->token = $token;
    }

    public function via($notifiable)
    {
        return ['mail'];
    }

    public function toMail($notifiable)
    {
        $url = url(route('password.reset', [
            'token' => $this->token,
            'email' => $notifiable->getEmailForPasswordReset(),
        ], false));

        return (new MailMessage)
            ->subject(__('Terlupa Kata Laluan'))
            // ->line(__('You are receiving this email because we received a password reset request for your account.'))
            ->line(__('Anda menerima e-mel ini kerana kami menerima permintaan tetapan semula kata laluan untuk akaun anda.'))
            ->action(__('Tetapan Semula Kata Laluan'), $url)
            ->line(__('Pautan ini akan tamat dalam :count minit.', ['count' => config('auth.passwords.'.config('auth.defaults.passwords').'.expire')]));
            // ->line(__(' If you did not request a password reset, no further action is required.'));
    }
}
