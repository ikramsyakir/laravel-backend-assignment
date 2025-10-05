<?php

namespace App\Services;

class PasswordGeneratorService
{
    protected array $symbols = ['!', '#', '$', '%', '&', '(', ')', '*', '+', '@', '^'];

    public function generate(
        int $length = 12,
        bool $lowercase = true,
        bool $uppercase = true,
        bool $number = true,
        bool $symbol = true
    ): string {
        $characters = collect();

        if ($lowercase) {
            $characters = $characters->merge(range('a', 'z'));
        }

        if ($uppercase) {
            $characters = $characters->merge(range('A', 'Z'));
        }

        if ($number) {
            $characters = $characters->merge(range(0, 9));
        }

        if ($symbol) {
            $characters = $characters->merge($this->symbols);
        }

        // fallback if no option selected
        if ($characters->isEmpty()) {
            $characters = collect(range('a', 'z'));
        }

        return collect(range(1, $length))
            ->map(fn () => $characters->random())
            ->join('');
    }
}
