<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Sanctum\PersonalAccessToken;

class ApiTokenController extends Controller
{
    public function index(Request $request)
    {
        return view('api-tokens.index', [
            'tokens' => $request->user()->tokens,
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $token = $request->user()->createToken($validated['name']);

        return back()->with('success', 'API token created successfully. Your new token is: ' . $token->plainTextToken);
    }

    public function destroy(Request $request, $tokenId)
    {
        $token = $request->user()->tokens()->findOrFail($tokenId);
        $token->delete();

        return back()->with('success', 'API token revoked successfully.');
    }
}
