<?php

namespace App\Http\Controllers;
use Illuminate\View\View;

use Illuminate\Http\Request;

class InscriptionController extends Controller
{
    public function create(): View
    {
        return view('auth.registration-succes');
    }

 
}