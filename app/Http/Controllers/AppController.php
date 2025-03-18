<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use Inertia\Response;

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
}
