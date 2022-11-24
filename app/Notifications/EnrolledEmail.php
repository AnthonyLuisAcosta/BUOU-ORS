<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use App\Models\Fees;
use Illuminate\Support\HtmlString;

class EnrolledEmail extends Notification
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
        $fee = Fees::where('appRef_id', $notifiable->id)->first();
        return (new MailMessage)
            ->greeting('Greetings!')
            ->line('Congratulations ' . $notifiable->firstName . ' ' . $notifiable->lastName . '!. You are now enrolled. Welcome to Bicol University Open University.')
            ->line('We have received your payment regarding your assessed fees for your chosen program.')
            ->line('OR Reference Number:')
            ->line(new HtmlString('<h1><strong>' . $fee->receipt . '</strong></h1>'))
            ->line('Please go to the office of the registrar to print your new certificate of registration. ')
            ->action('Home Page', url('/'));
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
