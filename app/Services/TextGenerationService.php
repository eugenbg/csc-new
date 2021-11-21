<?php

namespace App\Services;

use GuzzleHttp\Client;
use Illuminate\Http\Request;

class TextGenerationService {

    public static function generate($inputText, $prompt, $tokens, $temperature, $top_p, $frequencyPenalty)
    {
        $client = new Client();
        $payload = sprintf($prompt, $inputText);
        $apiKey = env('OPENAI_API_KEY');
        $response = $client->post('https://api.openai.com/v1/engines/curie/completions', [
            'headers' => ['Authorization' => sprintf('Bearer %s', $apiKey)],
            'json' => [
                'prompt' => $payload,
                'max_tokens' => 200,
                "temperature" => 0.2,
                "top_p" => 1,
                "frequency_penalty" => 1,
                "stop" => '"""'
            ]
        ]);

        $result = json_decode($response->getBody()->__toString(), true);
        return $result["choices"][0]["text"];
    }

}
