<?php

namespace App\Services\TableData\Filters;

use Illuminate\Database\Eloquent\Builder;

class EmailFilter
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
                $query->orWhereLike('email', '%' . $this->search . '%');
            } else {
                $query->whereLike('email', '%' . $this->search . '%');
            }
        } else {
            if ($this->or) {
                $query->orWhere('email', $this->search);
            } else {
                $query->Where('email', $this->search);
            }
        }
    }
}
