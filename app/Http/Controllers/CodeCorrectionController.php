<?php
namespace App\Http\Controllers;

use App\Models\CodeSubmission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
                    'content' => "Fix the following $language code and return just the corrected version: and grade the code base on the \n\n$code the user enter"
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

            $saved = CodeSubmission::create([
                'user_id' => Auth::id(),

                'language' => $language,
                'code' => $code,
                'ai_feedback' => $correctedCode
            ]);
            return response()->json(['corrected_code' => $correctedCode]);

        } catch (\Exception $e) {
            return response()->json(['error' => 'An error occurred while processing your request'], 500);
        }
        // Optionally, you can save the submission to the database

    }
    public function history()
    {
        $submissions = CodeSubmission::latest()->paginate(4);
        return view('history', compact('submissions'));
    }
    public function delete($id)
    {
        $history = CodeSubmission::findOrFail($id);
        $history->delete();
    return redirect()->back()->with('success', 'History deleted successfully.');




    }
}
