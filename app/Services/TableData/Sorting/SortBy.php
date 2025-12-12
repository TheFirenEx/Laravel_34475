<?php

namespace App\Services\TableData\Sorting;

use Illuminate\Database\Eloquent\Builder;

class SortBy
{
    public function __construct(
        private ?string $sortBy = 'id',
        private ?string $sortDirection = 'asc',
    ) {}

    public function __invoke(Builder $query): void
    {
        if (! empty($this->sortBy) && ! empty($this->sortDirection)) {
            $query->orderBy($this->sortBy, $this->sortDirection);
        }
    }
}
