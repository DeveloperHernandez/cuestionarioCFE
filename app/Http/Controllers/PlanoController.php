<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PlanoController extends Controller
{
    public function indexPlano($id_cliente)
    {
        return view('plano',compact('id_cliente'));
    }
    
}