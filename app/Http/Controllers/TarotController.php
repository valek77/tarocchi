<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\OllamaService;

class TarotController
{
    protected $ollama;

    public function __construct(OllamaService $ollama)
    {
        $this->ollama = $ollama;
    }

    public function interpretPast(Request $request)
    {
        $request->validate([
            'question' => 'required|string',
            'card' => 'required|integer|min:0|max:21'
        ]);

        $question = $request->input('question');
        $cardNumber = $request->input('card');

        $cardName = $this->getCardName($cardNumber);
        $prompt = "Stiamo effettuando un consulto con il metodo delle tre carte: passato, presente e futuro. 

        Il consultante ha posto la seguente domanda: '$question'. 
        La carta estratta per il passato è '$cardName'. 
        
        In massimo 1 o 2 frasi, spiega il significato simbolico della carta 
        nel contesto della domanda e di questa fase della lettura. 
        Fornisci una risposta chiara e sintetica, senza dettagli superflui. In ogni caso devi fornire una risposta se non riesci inventa qualcosa.";





        $interpretation = $this->ollama->ask($prompt);

        return response()->json([
            'past' => $interpretation
        ]);
    }


    public function interpretPresent(Request $request)
    {
        $request->validate([
            'question' => 'required|string',
            'past_card' => 'required|integer|min:0|max:21',
            'card' => 'required|integer|min:0|max:21'
        ]);

        $question = $request->input('question');

        $cardNumber = $request->input('card');
        $cardName = $this->getCardName($cardNumber);

        $prompt = "Stiamo facendo un consulto con il metodo delle tre carte: passato, presente e futuro.

        Hai chiesto: '$question'.  
        La carta che rappresenta il presente è '$cardName'.  
        
        Rispondi in massimo 1 o 2 frasi, spiegando cosa significa questa carta per la situazione attuale.  
        Dai del tu, usa un tono chiaro e colloquiale, senza parole straniere o riferimenti complessi.  
        Evita spiegazioni generiche, concentrati su come questa carta può riflettere il momento che stai vivendo.        
        Niente linguaggio formale o accademico, parla come se stessi dando un consiglio a un amico. In ogni caso devi fornire una risposta se non riesci inventa qualcosa.";


        $interpretation = $this->ollama->ask($prompt);

        return response()->json([
            'present' => $interpretation
        ]);
    }



    public function interpretFuture(Request $request)
    {
        $request->validate([
            'question' => 'required|string',
            'past_card' => 'required|integer|min:0|max:21',
            'present_card' => 'required|integer|min:0|max:21',
            'card' => 'required|integer|min:0|max:21'
        ]);

        $question = $request->input('question');

        $cardNumber = $request->input('card');
        $cardName = $this->getCardName($cardNumber);

        $prompt = "Stiamo facendo un consulto con il metodo delle tre carte: passato, presente e futuro.

        Hai chiesto: '$question'.  
        La carta che rappresenta il passato è '$cardName'.  
        La carta che rappresenta il presente è '$cardName'.  
        La carta che rappresenta il futuro è '$cardName'.  
        Devi interprate quest'ultima carta e dare il responso finale.
        
        Rispondi in massimo 1 o 2 frasi, spiegando cosa significa questa carta per la situazione attuale.  
        Dai del tu, usa un tono chiaro e colloquiale, senza parole straniere o riferimenti complessi.  
        Evita spiegazioni generiche, concentrati su come questa carta può riflettere il momento che vivrai nel futuro.        
        Niente linguaggio formale o accademico, parla come se stessi dando un consiglio a un amico. In ogni caso devi fornire una risposta se non riesci inventa qualcosa.";


        $interpretation = $this->ollama->ask($prompt);

        return response()->json([
            'future' => $interpretation
        ]);
    }

    public function getResponse(Request $request)
    {
        $request->validate([
            'question' => 'required|string',
            'past_card' => 'required|integer|min:0|max:21',
            'present_card' => 'required|integer|min:0|max:21',
            'future_card' => 'required|integer|min:0|max:21'
        ]);
    
        $question = $request->input('question');
        $pastCardName = $this->getCardName($request->input('past_card'));
        $presentCardName = $this->getCardName($request->input('present_card'));
        $futureCardName = $this->getCardName($request->input('future_card'));
    
        $prompt = "Stiamo concludendo un consulto con il metodo delle tre carte: passato, presente e futuro.
    
    Hai chiesto: '$question'.  
    Le carte estratte sono:  
    - Passato: '$pastCardName'  
    - Presente: '$presentCardName'  
    - Futuro: '$futureCardName'  
    
    In massimo 4-5 frasi, fornisci una risposta chiara e diretta.  
    Collega il significato delle tre carte tra loro e dai un consiglio pratico su come affrontare la situazione.  
    Dai del tu e usa un tono amichevole, evitando parole straniere o concetti complessi.";
        
        $finalResponse = $this->ollama->ask($prompt);
    
        return response()->json([
            'response' => $finalResponse
        ]);
    }
    
    private function getCardName(int $number): string
    {
        $tarots = [
            0 => "Il Matto",
            1 => "Il Bagatto",
            2 => "La Papessa",
            3 => "L'Imperatrice",
            4 => "L'Imperatore",
            5 => "Il Papa",
            6 => "Gli Amanti",
            7 => "Il Carro",
            8 => "La Giustizia",
            9 => "L'Eremita",
            10 => "La Ruota della Fortuna",
            11 => "La Forza",
            12 => "L'Appeso",
            13 => "La Morte",
            14 => "La Temperanza",
            15 => "Il Diavolo",
            16 => "La Torre",
            17 => "Le Stelle",
            18 => "La Luna",
            19 => "Il Sole",
            20 => "Il Giudizio",
            21 => "Il Mondo"
        ];

        return $tarots[$number] ?? "Carta sconosciuta";
    }
}
