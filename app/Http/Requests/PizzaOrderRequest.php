<?php

namespace App\Http\Requests;

use App\Services\PizzaOrderService;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class PizzaOrderRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function wantsJson(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'size' => ['string', Rule::in(array_keys(PizzaOrderService::PIZZA_PRICE))],
            'pepperoni' => ['boolean'],
            'extra_cheese' => ['boolean'],
        ];
    }

    protected function prepareForValidation(): void
    {
        $this->merge([
            'size' => $this->input('size', PizzaOrderService::MEDIUM),
            'pepperoni' => $this->boolean('pepperoni'),
            'extra_cheese' => $this->boolean('extra_cheese'),
        ]);
    }
}
