<?php

namespace App\Console\Commands;

use App\Services\PizzaOrderService;
use Illuminate\Console\Command;
use Illuminate\Support\Number;
use Illuminate\Support\Str;

use function Laravel\Prompts\confirm;
use function Laravel\Prompts\info;
use function Laravel\Prompts\note;
use function Laravel\Prompts\select;
use function Laravel\Prompts\table;

class PizzaOrder extends Command
{
    protected $signature = 'pizza:order';

    protected $description = 'Place a pizza order';

    public function handle(PizzaOrderService $pizzaOrderService): void
    {
        $size = select(
            label: 'Choose your pizza size?',
            options: $pizzaOrderService->getSizeOptions(),
            default: $pizzaOrderService::MEDIUM,
        );

        $pepperoniPrice = $pizzaOrderService::PEPPERONI_PRICE[$size];

        $pepperoni = confirm(
            label: "Would you like to add pepperoni? (+ RM $pepperoniPrice)",
            default: false,
        );

        $cheesePrice = $pizzaOrderService::CHEESE_PRICE;

        $extraCheese = confirm(
            label: "Would you like to add extra cheese? (+ RM $cheesePrice)",
            default: false,
        );

        $finalBill = $pizzaOrderService->calculate($size, $pepperoni, $extraCheese);

        $addons = [];
        if ($pepperoni) {
            $addons[] = 'Pepperoni';
        }

        if ($extraCheese) {
            $addons[] = 'Extra Cheese';
        }

        note('Order Summary');

        $finalAddons = 'None';
        if ($addons) {
            $finalAddons = implode(', ', $addons);
        }

        $finalPrice = Number::currency($finalBill, 'MYR', 'ms');

        table(
            headers: ['Item', 'Details'],
            rows: [
                ['Size', Str::title($size)],
                ['Add-ons', $finalAddons],
                ['Final Bill', $finalPrice],
            ]
        );

        info('Thank you for your order! Your pizza is on the way!');
    }
}
