<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class SentimentAnalysisService
{
    public function analyze(string $text): string
    {
        // Integration simulation for LLM (OpenAI API)
        // In real app: use Http::withToken(config('services.openai.key'))->post(...)
        
        $score = rand(1, 10);
        return $score > 5 ? 'positive' : 'negative';
    }
}
