<?php

namespace App\Services;

use App\Models\Spell;
use GuzzleHttp\Client;

class TextGenerationService {

    public static function generate($inputText, Spell $spell)
    {
        $client = new Client();
        $payload = sprintf($spell->prompt, $inputText);
        if($spell->tokens == 0) {
            $tokens = count(explode(' ', $inputText)) * 1.5;
        }
        $apiKey = env('OPENAI_API_KEY');
        $response = $client->post(sprintf('https://api.openai.com/v1/engines/%s/completions', $spell->engine), [
            'headers' => ['Authorization' => sprintf('Bearer %s', $apiKey)],
            'json' => [
                'prompt' => $payload,
                'max_tokens' => $spell->tokens, //200
                "temperature" => (float) $spell->temperature, //0.2
                "top_p" => (float) $spell->top_p, //1
                "frequency_penalty" => (float) $spell->frequency_penalty, //1
                "stop" => ['"""', 'Text:', 'Seed']
            ]
        ]);

        $result = json_decode($response->getBody()->__toString(), true);
        return $result["choices"][0]["text"];
    }

    public function getEngines()
    {
        $client = new Client();
        $apiKey = env('OPENAI_API_KEY');
        $response = $client->get('https://api.openai.com/v1/engines', [
            'headers' => ['Authorization' => sprintf('Bearer %s', $apiKey)]
        ]);
        return json_decode($response->getBody()->__toString(), true);
    }

}
