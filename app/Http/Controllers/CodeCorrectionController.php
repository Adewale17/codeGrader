<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class CodeCorrectionController extends Controller
{
    public function correctCode(Request $request)
    {
        // Validate the incoming request to ensure code and language are provided
        $request->validate([
            'code' => 'required|string',
            'language' => 'required|string',
        ]);

        $code = $request->input('code');
        $language = $request->input('language');

        $apiKey = env('OPENROUTER_API_KEY');
        $apiUrl = "https://openrouter.ai/api/v1/chat/completions";  // The OpenRouter API endpoint

        $payload = [
            'model' => 'deepseek/deepseek-chat:free',  // Specify the model you want to use
            'messages' => [
                [
                    'role' => 'user',
                    'content' => "Fix the following $language code and return only the corrected version:\n\n$code"
                ]
            ]
        ];

        try {
            $response = Http::withHeaders([
                'Content-Type' => 'application/json',
                'Authorization' => "Bearer $apiKey",
            ])->post($apiUrl, $payload);

            if ($response->failed()) {
                return response()->json(['error' => 'Failed to fetch AI response'], 500);
            }

            $correctedCode = $response->json()['choices'][0]['message']['content'] ?? 'No correction provided';

            return response()->json(['corrected_code' => $correctedCode]);

        } catch (\Exception $e) {
            return response()->json(['error' => 'An error occurred while processing your request'], 500);
        }
    }
}
