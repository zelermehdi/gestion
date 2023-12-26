<?php

namespace App\Http\Controllers;

use App\Models\BailType;
use Baiss\ViewGenerator\Traits\Crud\CrudTrait;

class BailTypeController extends Controller {
    public function create()
    {
        return view('bailtypes.create');
    }
    public function index()
    {
        $bailTypes =  BailType::all();
        return view('bailtypes.index', compact('bailTypes'));
    }
}
