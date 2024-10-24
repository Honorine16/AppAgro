<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Broadcasting\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Support\Facades\Notification;


class MessageReceived extends Notification implements ShouldQueue
{
    use Queueable;

    public $id;
    protected $message;

    /**
     * Create a new notification instance.
     */
    public function __construct($message)
    {
         $this->message = $message;
    }
    
       /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
                    ->line('Vous venez de recevoir un nouveau message.')
                    ->line('Message: ' . $this->message)
                    ->action('Notification Action', url('/chat'))
                    ->line('Merci d\'utiliser AppAgro!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            //
        ];
    }
}
