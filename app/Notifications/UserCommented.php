<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use App\Models\User;
use App\Models\Comment;

class UserCommented extends Notification
{
    use Queueable;

    protected $comment;


    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($comment)
    {
        $this->comment = $comment;
    }


    public function via($notifiable)
    {
        return ['database','broadcast'];
    }


    public function toDatabase($notifiable)
    {
        return [
            'comment' => $this->comment,
            'comment_id' => $this->comment->id,
        ];
    }
    public function toBroadcast($notifiable)
    {
        return [
            'id' => $this->id,
            'read_at' => null,
            'created_at' => $this->comment->created_at,
            'data' => [
                'comment' => $this->comment,
            ]
        ];
    }

    //     public function toArray($notifiable)
    // {
    //     return [
    //         'id' => $this->id,
    //         'read_at' => null,
    //         'data' => [
    //             'commenter_id' => $this->commenter->id,
    //         ]
    //     ];
    // }


    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    // public function toMail($notifiable)
    // {
    //     return (new MailMessage)
    //                 ->line('The introduction to the notification.')
    //                 ->action('Notification Action', url('/'))
    //                 ->line('Thank you for using our application!');
    // }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */

}
