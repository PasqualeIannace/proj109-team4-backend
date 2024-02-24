<?php

namespace App;

use Illuminate\Pagination\LengthAwarePaginator;

class CustomPaginator extends LengthAwarePaginator
{
    public function renderOnlyNextPrevious($options = [])
    {
        $options = array_merge([
            'path' => LengthAwarePaginator::resolveCurrentPath(),
        ], $options);

        return (string) (new static(
            $this->items,
            $this->total,
            $this->perPage,
            $this->currentPage,
            $options
        ))->onEachSide(0)->links();
    }
}
