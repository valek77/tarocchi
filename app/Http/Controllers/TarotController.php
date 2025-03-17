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
        
        In massimo 3-4 frasi, spiega il significato simbolico della carta 
        nel contesto della domanda e di questa fase della lettura. 
        Fornisci una risposta chiara e sintetica, senza dettagli superflui.";
        
        
        


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
        
        Rispondi in massimo 3-4 frasi, spiegando cosa significa questa carta per la situazione attuale.  
        Dai del tu, usa un tono chiaro e colloquiale, senza parole straniere o riferimenti complessi.  
        Evita spiegazioni generiche, concentrati su come questa carta può riflettere il momento che stai vivendo.        
        Niente linguaggio formale o accademico, parla come se stessi dando un consiglio a un amico.";
        
        
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
            'card' => 'required|integer|min:0|max:21'
        ]);
    
        $question = $request->input('question');
      
        $cardNumber = $request->input('card');
        $cardName = $this->getCardName($cardNumber);
    
        $prompt = "Stiamo facendo un consulto con il metodo delle tre carte: passato, presente e futuro.

        Hai chiesto: '$question'.  
        La carta che rappresenta il futuro è '$cardName'.  
        
        Rispondi in massimo 3-4 frasi, spiegando cosa significa questa carta per la situazione attuale.  
        Dai del tu, usa un tono chiaro e colloquiale, senza parole straniere o riferimenti complessi.  
        Evita spiegazioni generiche, concentrati su come questa carta può riflettere il momento che vivrai nel futuro.        
        Niente linguaggio formale o accademico, parla come se stessi dando un consiglio a un amico.";
        
        
        $interpretation = $this->ollama->ask($prompt);
    
        return response()->json([
            'future' => $interpretation
        ]);
    }

    public function getResponse(Request $request)
    {
        $request->validate([
            'question' => 'required|string',
            'past' => 'required|string',
            'present' => 'required|string',
            'future' => 'required|string'
        ]);

        $question = $request->input('question');
        $pastInterpretation = $request->input('past');
        $presentInterpretation = $request->input('present');
        $futureInterpretation = $request->input('future');

        $prompt = "La domanda è: '$question'. 
        Interpretazione Passato: '$pastInterpretation'.
        Interpretazione Presente: '$presentInterpretation'.
        Interpretazione Futuro: '$futureInterpretation'.
        
        Dai un responso finale completo al consultante, tenendo conto delle tre interpretazioni.";

        $finalResponse = $this->ollama->ask($prompt);

        return response()->json([
            'response' => $finalResponse
        ]);
    }

    private function getCardName(int $number): string
    {
        $tarots = [
            0 => "Il Matto", 1 => "Il Bagatto", 2 => "La Papessa", 3 => "L'Imperatrice",
            4 => "L'Imperatore", 5 => "Il Papa", 6 => "Gli Amanti", 7 => "Il Carro",
            8 => "La Giustizia", 9 => "L'Eremita", 10 => "La Ruota della Fortuna", 
            11 => "La Forza", 12 => "L'Appeso", 13 => "La Morte", 14 => "La Temperanza", 
            15 => "Il Diavolo", 16 => "La Torre", 17 => "Le Stelle", 18 => "La Luna", 
            19 => "Il Sole", 20 => "Il Giudizio", 21 => "Il Mondo"
        ];

        return $tarots[$number] ?? "Carta sconosciuta";
    }
}
