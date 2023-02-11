<?php

declare(strict_types=1);

namespace App\Providers;

use App\Support\SearchQuery;
use Illuminate\Database\Query\Builder;
use Illuminate\Support\ServiceProvider;

class MacroServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        $this->queryBuilderMacros();
    }

    public function queryBuilderMacros() :void
    {
        Builder::macro('whereKeyword', function (string $column, SearchQuery $searchQuery){
            /* @var Builder $builder */
            $builder = $this;

            $builder->where($column, 'LIKE', '%'.$searchQuery->value().'%', 'and');

        });
    }
}
