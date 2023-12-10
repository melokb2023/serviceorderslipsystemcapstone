<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class AppointmentReceivedNotification extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
    public $customerappointment;
    public function __construct($customerappointment)
    {
        $this->customerappointment = $customerappointment;
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
    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject('Appointment Received')
            ->greeting('Hi ' . $notifiable->name)
            ->line('Thanks for contacting us. We have received your appointment data and appreciate you for reaching out.')
            ->action('View Appointment', url('/appointments')); // Adjust the URL as needed.
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
