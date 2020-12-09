<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class NewNotify extends Notification implements ShouldQueue
{
    use Queueable;

    public $post;

    public function __construct($post)
    {
        $this->post = $post;
    }

    public function via($notifiable)
    {
        return ['mail'];
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject('Hey, New article is availabe')
            ->line('Higgs boson has published a new article')
            ->line('Post title : ' . $this->post->title)
            ->action('Read Post', url(route('article', $this->post->slug)))
            ->line('Thank you for being with us!');
    }

    public function toArray($notifiable)
    {
        return [
//
        ];
    }
}
