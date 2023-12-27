<?php

namespace App\Console\Commands;

use Carbon\Carbon;
use App\Models\Location;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;
use App\Notifications\BailDateNotification;
use Illuminate\Support\Facades\Notification;

class CheckBailDates extends Command
{
    protected $signature = 'bail:check';
    protected $description = 'Vérifie les dates de signature de bail et envoie un e-mail si nécessaire.';

    public function handle()
    {
        $now = Carbon::now();
        $oneMonthFromNow = $now->copy()->addMonth(); // Calcul de la date dans un mois
        
        $locations = Location::whereBetween('date_signature_bail', [$now, $oneMonthFromNow])
                             ->get();
    
        foreach ($locations as $location) {
            $dateSignatureBail = Carbon::parse($location->date_signature_bail); // Convertir la date en objet Carbon
            $diffInDays = $dateSignatureBail->diffInDays($now); // Utiliser $now au lieu de Carbon::now()
    
            Log::info('Différence en jours: ' . $diffInDays);
            
            Notification::route('mail', $location->user->email)->notify(new BailDateNotification($location, $location->user));
        }
    }
}
