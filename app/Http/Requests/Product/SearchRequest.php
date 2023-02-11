<?php

declare(strict_types=1);

namespace App\Http\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;

class SearchRequest extends FormRequest
{
    public function rules()
    {
        return [
            'search' => ['nullable', 'max:255'],
        ];
    }
}
