<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class SuccessfullySubscribed extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct()
    {
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
            ->subject('Welcome to the Origins Wine Mag Family')
            ->line("Thank you for signing up to receive Origins Wine Magazine's emails, welcome to our community!")
            ->line("Who We Are")
            ->line("Origins Wine Mag is Armenia’s wine and food digital publication. We cover everything from the latest restaurant openings, events, and news about Armenia’s best wineries.")
            ->line("We want to inspire you to discover the new (yet ancient) wine territory of Armenia with friends and family. We are your ultimate resource for all things involving Armenian food and wine.")
            ->line("What You'll Expect As a special thank you for your interest in Origins Wine Magazine, you’ll be the first to know when new content posts.")
            ->line("Here's what else you can expect:")
            ->line("- Articles about Armenia’s booming wine and food industry")
            ->line("- Monthly selections of recipes and wines Culinary and wine events happening in Armenia and around the world")
            ->line("- Access to Origins Magazine's Contests, and more!")
            ->line("Don't Miss Out")
            ->line("Please add info@originswinemag.com to your address book now to ensure our emails make it to your inbox. Also, feel free to invite your friends and family to join our community.")
            ->line("If you prefer not to receive our emails, you may unsubscribe anytime and you will be removed promptly from our list.")
            ->line("P.s. You can follow us on social media for even more must-know Armenian news.")
            ->line("https://www.facebook.com/originswinemag  https://twitter.com/origins_mag  https://www.instagram.com/originswinemag/");

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
