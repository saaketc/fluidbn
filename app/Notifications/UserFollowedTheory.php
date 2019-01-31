<?php

namespace App\Notifications;
use App\User;
use App\Theory;
use Illuminate\Bus\Queueable;

use Illuminate\Notifications\Notification;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class UserFollowedTheory extends Notification implements ShouldQueue
{
    use Queueable;
    protected $user;
    protected $theory;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(User $user,Theory $theory)
    {
        $this->user = $user;
        $this->theory = $theory;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database'];
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
                    ->line('The introduction to the notification.')
                    ->action('Notification Action', url('/'))
                    ->line('Thank you for using our application!');
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
    public function toDatabase($notifiable)
    {
        return [
            'theory_id'=>$this->theory->id,
            'theory_title'=>$this->theory->title,
            'message'=> ucfirst($this->user->fname).' '.ucfirst($this->user->lname).' added a new theory - '.ucfirst($this->theory->title)

        ];
    }
}
