<?php

declare(strict_types=1);

namespace App\Models;

use App\Models\Scopes\ProductScope;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory,
        ProductScope;

    protected $guarded = [
        'id',
        'created_at',
        'updated_at',
    ];
}
