<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use Inertia\Response;
use Illuminate\Http\Request;

class AppController
{
    public function index(): Response
    {
        return Inertia::render('Index', [
           
        ]);
    }

    public function mazzo3Carte():Response{
        return Inertia::render('MazzoCarte', [
            'numCarte' => 3,
        ]);

    }

    public function mazzo5Carte():Response{
        return Inertia::render('MazzoCarte', [
            'numCarte' => 5,
        ]);

    }


    public function responso3Carte(Request $request ):Response{

        $domanda = $request->input("domanda");

        return Inertia::render('Responso3Carte', [
            'domanda' => $domanda,
        ]);

    }

    public function responso5Carte(Request $request ):Response{

      

        return Inertia::render('Responso5Carte', [
           
        ]);

    }
}
