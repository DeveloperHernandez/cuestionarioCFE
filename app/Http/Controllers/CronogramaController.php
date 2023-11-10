<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CronogramaController extends Controller
{
    public function index()
    {
        return view('InformacionPostes.cronograma');
    }

    public function guardarCronograma()
    {

    }

}