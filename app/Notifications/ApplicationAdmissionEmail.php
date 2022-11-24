<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ApplicationAdmissionEmail extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->greeting('To whom it may concern;')
            ->line('We are pleased to inform you that your application is now being assessed. Please visit the office of the registrar and print a copy of your registration form with its assessed fees.')
            ->line('Your application is now being processed to the next step. We will keep you posted on the status of your application.')
            ->line('If you have not received a message from us within the next five working days, please contact us.')
            ->action('Home Page', url('/'));
        /*
            ->line('To whom it may concern;')
            ->line('This is to inform you that your application has been approved.')
            ->line('Congratulations and Welcome to Bicol University Open University! ')
            ->action('Home Page', url('/'));
        */
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
