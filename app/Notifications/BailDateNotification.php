<?php

namespace App\Notifications;

use App\Models\Location;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class BailDateNotification extends Notification
{
    use Queueable;

    protected $location;
    protected $user;

    public function __construct(Location $location , User $user )
    {

        $this->location = $location;
        $this->user =$user;

    }

    public function via($notifiable)
    {
        return ['mail']; // Vous pouvez ajouter d'autres canaux si nécessaire à l'avenir
    }

    public function toMail($notifiable): MailMessage
    {
        return (new MailMessage)
                    ->subject('Bail nécessitant votre attention')
                    ->greeting('Bonjour,'.$this->user->last_name)
                    ->line('Vous avez un bail qui nécessite votre attention:')
                    ->line('Date de signature du bail: ' . \Carbon\Carbon::parse($this->location->date_signature_bail)->format('d/m/Y'))
                    ->action('Voir les détails', url('/')) // Ajustez l'URL selon vos besoins.
                    ->line('Merci d\'avoir utilisé l\'application.');
    }

    public function toArray($notifiable): array
    {
        return [
            //
        ];
    }
}
