<?php

namespace App\Http\Controllers;

use App\Http\Requests\PasswordGenerateRequest;
use App\Services\PasswordGeneratorService;

class PasswordGenerateController extends Controller
{
    public function __invoke(PasswordGenerateRequest $request, PasswordGeneratorService $passwordGeneratorService)
    {
        $validated = $request->validated();

        $password = $passwordGeneratorService->generate(
            length: $validated['length'] ?? 12,
            lowercase: $validated['lowercase'] ?? true,
            uppercase: $validated['uppercase'] ?? true,
            number: $validated['number'] ?? true,
            symbol: $validated['symbol'] ?? true,
        );

        return response()->json(['password' => $password]);
    }
}
