<?php

namespace App\Services;

use GuzzleHttp\Client;

class OllamaService
{
    protected $client;
    private $OLLAMA_URL;

    public function __construct()
    {
        $OLLAMA_URL = env('OLLAMA_URL', 'http://localhost:11434');


        $this->client = new Client([
            'base_uri' => $OLLAMA_URL,
            'timeout'  => 30,
        ]);
    }

    public function ask(string $prompt, string $model = 'llama3.1:8b'): string
    {
        $response = $this->client->post('/api/generate', [
            'json' => [
                'model' => $model,
                'prompt' => $prompt,
                'stream' => false
            ],
        ]);

        $data = json_decode($response->getBody(), true);

        return $data['response'] ?? '';
    }
}
