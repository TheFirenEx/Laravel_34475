<?php

namespace App\Services\TableData\Pagination;

use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Builder;

class Paginate
{
    public function __construct(
        private int $perPage = 12,
    ) {}

    public function __invoke(Builder $query): LengthAwarePaginator
    {
        return $query->paginate($this->perPage);
    }
}
