<?php

declare(strict_types=1);

namespace App\Support;

use Illuminate\Support\Str;

class SearchQuery
{
    protected ?string $keyword;

    public function __construct(?string $keyword)
    {
        $this->keyword = $this->normalize($keyword);
    }

    public static function from(?string $keyword): self
    {
        return new static($keyword);
    }

    protected function normalize(?string $keyword): string
    {
        return Str::of($keyword)->squish()->trim()->value();
    }

    public function isEmpty(): bool
    {
        return Str::of($this->keyword)->isEmpty();
    }

    public function value(): string
    {
        return Str::of($this->keyword)->value();
    }
}
