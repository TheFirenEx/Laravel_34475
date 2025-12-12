<?php

namespace App\Services\TableData\Filters;

use Illuminate\Database\Eloquent\Builder;

class NameFilterFilter
{

    public function __construct(
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
                $query->orWhereLike('name', '%' . $this->search . '%');
            } else {
                $query->whereLike('name', '%' . $this->search . '%');
            }
        } else {
            if ($this->or) {
                $query->orWhere('name', $this->search);
            } else {
                $query->Where('name', $this->search);
            }
        }
    }
}
