<?php

namespace App\Services\TableData\Filters;

use Illuminate\Database\Eloquent\Builder;

class Filter
{

    public function __construct(
        protected readonly string $column,
        protected readonly ?string $search = null,
        protected readonly bool $or = false,
        protected readonly bool $like = true,
    ) {}

    public function __invoke(Builder $query): void
    {
        if (empty($this->search)){
            return;
        }
        if ($this->like) {
            if ($this->or) {
                $query->orWhereLike($this->column, '%' . $this->search . '%');
            } else {
                $query->whereLike($this->column, '%' . $this->search . '%');
            }
        } else {
            if ($this->or) {
                $query->orWhere($this->column, $this->search);
            } else {
                $query->Where($this->column, $this->search);
            }
        }
    }
}
