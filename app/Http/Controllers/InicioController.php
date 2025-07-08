<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InicioController extends Controller
{
    public function index()
    {
        // Dados básicos para a página inicial
        $totalEventos = 0;
        $totalParticipantes = 0;
        $eventosEsteMs = 0;
        $proximosEventos = 0;

        return view('inicio', compact(
            'totalEventos',
            'totalParticipantes', 
            'eventosEsteMs',
            'proximosEventos'
        ));
    }
}