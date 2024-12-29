<?php

namespace App\Notifications;

use App\Models\User;
use Filament\Notifications\Notification as FilamentNotifications;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\DatabaseMessage;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class UserRegistered extends Notification implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
    public function __construct(protected User $user)
    {
        $this -> user = $user;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail','database'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toDatabase(object $notifiable)
    {
        // return new DatabaseMessage([
        //     'message' => "{$this -> user -> name} ({$this -> user -> email}) vừa đăng ký",
        //     'user_id' => $this -> user -> id,
        // ]);

        return FilamentNotifications::make()
            -> title("{$this -> user -> name} ({$this -> user -> email}) vừa đăng ký") 
            -> getDatabaseMessage();
    }

    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
            ->subject('test')
            ->action('Click me',url('test'))
            ->line("Thank you {$this -> user -> name} for using our application");
    }
}