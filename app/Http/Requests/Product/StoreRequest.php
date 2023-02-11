<?php

declare(strict_types=1);

namespace App\Http\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
{
    public function rules()
    {
        return [
            'name' => ['required', 'string', 'min:3', 'max:255'],
            'slug' => ['required', 'string', 'min:3', 'max:255'],
            'description' => ['nullable', 'min:10', 'max:1000'],
            'price' => ['required', 'numeric', 'min:1', 'max:9999'],
        ];
    }
}
