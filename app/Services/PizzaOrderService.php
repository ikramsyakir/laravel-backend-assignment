<?php

namespace App\Services;

use InvalidArgumentException;

class PizzaOrderService
{
    public const string SMALL = 'small';

    public const string MEDIUM = 'medium';

    public const string LARGE = 'large';

    public const array PIZZA_PRICE = [
        self::SMALL => 15,
        self::MEDIUM => 22,
        self::LARGE => 30,
    ];

    public const array PEPPERONI_PRICE = [
        self::SMALL => 3,
        self::MEDIUM => 5,
        self::LARGE => 5,
    ];

    public const int CHEESE_PRICE = 6;

    public function calculate(string $size, bool $pepperoni = false, bool $extraCheese = false): float
    {
        $size = strtolower($size);

        $price = self::PIZZA_PRICE[$size] ?? throw new InvalidArgumentException('Invalid pizza size.');

        if ($pepperoni) {
            $price += self::PEPPERONI_PRICE[$size];
        }

        if ($extraCheese) {
            $price += self::CHEESE_PRICE;
        }

        return $price;
    }

    public function getSizeOptions(): array
    {
        return [
            self::SMALL => 'Small (RM '.self::PIZZA_PRICE[self::SMALL].')',
            self::MEDIUM => 'Medium (RM '.self::PIZZA_PRICE[self::MEDIUM].')',
            self::LARGE => 'Large (RM '.self::PIZZA_PRICE[self::LARGE].')',
        ];
    }
}
