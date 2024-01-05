<?php

namespace App\Http\Controllers;

use App\Models\AccessCard;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class AccessCardController extends Controller
{
    public function storeCard(Request $request, $uid)
    {
        $card = new AccessCard();
        $card->user_id = 1;  // Remplacez par l'ID de l'utilisateur approprié
        $card->card_number = $uid;  // L'UID lu depuis le lecteur NFC
        $card->save();

        return response()->json(['message' => 'Card saved successfully']);
    }


    public function lireUID(Request $request)
    {
        // Exécutez le script Python pour lire l'UID
        $output = shell_exec('python3 /chemin/vers/votre/script.py');
        $uid = trim($output);  // Supprimez les espaces blancs supplémentaires

        // Enregistrez l'UID dans la base de données ou faites d'autres opérations nécessaires
        // ...

        return response()->json(['uid' => $uid]);
    }
}





