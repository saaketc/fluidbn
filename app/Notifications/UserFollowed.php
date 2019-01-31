<?php

namespace App\Notifications;
use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class UserFollowed extends Notification implements ShouldQueue
{
    use Queueable;

    protected $user;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(User $user)
    {
        $this->user = $user;
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
  /*  public function toMail($notifiable)
    {
       $msg= ucfirst($this->user->fname).' '.ucfirst($this->user->lname).' followed you'; ;
       $url =route('profile',['user'=>$this->user,'slug'=>str_slug($this->user->fname." ".$this->user->lname)]);
        return (new MailMessage)
                    ->line($msg)
                    ->action('See profile',$url)
                    ->line('Happy time spending at fluidbN');
    }*/

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
            'follower_id'=>$this->user->id,
            'follower_fname'=>$this->user->fname,
            'follower_lname'=>$this->user->lname,
            'message'=>ucfirst($this->user->fname).' '.ucfirst($this->user->lname).' followed you',
        ];
    }
}
