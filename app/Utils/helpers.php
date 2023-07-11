<?php

use Illuminate\Pagination\LengthAwarePaginator;

if (!function_exists('getIndexTable')) {

    /**
     * Get the index table
     *
     * @param int $index
     * @param LengthAwarePaginator $paginator
     * @return float|int
     */
    function getIndexTable(int $index, LengthAwarePaginator $paginator): float|int
    {
        return $index + 1 + $paginator->perPage() * ($paginator->currentPage() - 1);
    }
}
