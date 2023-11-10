<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InformacionPostesController extends Controller
{
    public function index()
    {
        return view('InformacionPostes.infraestructura_cfe');
    }
}