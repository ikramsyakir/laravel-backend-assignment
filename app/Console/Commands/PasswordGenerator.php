<?php

namespace App\Console\Commands;

use App\Services\PasswordGeneratorService;
use Illuminate\Console\Command;

use function Laravel\Prompts\confirm;
use function Laravel\Prompts\info;
use function Laravel\Prompts\text;

class PasswordGenerator extends Command
{
    protected $signature = 'password:generate';

    protected $description = 'Generate a random password with specified options';

    public function handle(): void
    {
        $passwordGenerator = new PasswordGeneratorService;

        $length = text(
            label: 'Password Length',
            placeholder: 'Enter password length',
            default: 12,
            validate: function (string $value) {
                if (! is_numeric($value)) {
                    return 'Length must be a number';
                }

                $value = (int) $value;

                if ($value < 0) {
                    return 'Password length cannot be negative number';
                }

                if ($value < 8) {
                    return 'Password length should be at least 8 characters';
                }

                return null; // valid
            }
        );

        $lowercase = confirm(label: 'Include Lowercase Letters?');
        $uppercase = confirm(label: 'Include Uppercase Letters?');
        $number = confirm(label: 'Include Numbers?');
        $symbol = confirm(label: 'Include Symbols?');

        $password = $passwordGenerator->generate($length, $lowercase, $uppercase, $number, $symbol);

        info("Generated Password: $password");
    }
}
