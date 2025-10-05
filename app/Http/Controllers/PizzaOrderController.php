<?php

namespace App\Http\Controllers;

use App\Http\Requests\PizzaOrderRequest;
use App\Services\PizzaOrderService;
use Illuminate\Support\Str;

class PizzaOrderController extends Controller
{
    public function __invoke(PizzaOrderRequest $request, PizzaOrderService $pizzaOrderService)
    {
        $validated = $request->validated();

        $price = $pizzaOrderService->calculate(
            size: $validated['size'],
            pepperoni: $validated['pepperoni'],
            extraCheese: $validated['extra_cheese'],
        );

        return response()->json([
            'size' => Str::title($validated['size']),
            'pepperoni' => (bool) $validated['pepperoni'],
            'extra_cheese' => (bool) $validated['extra_cheese'],
            'final_bill' => $price,
        ]);
    }
}
