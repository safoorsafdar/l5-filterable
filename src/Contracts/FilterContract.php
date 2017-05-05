<?php

namespace SafoorSafdar\Filterable\Contracts;

use Illuminate\Database\Eloquent\Builder;

interface FilterContract
{
    /**
     * Apply a given search value to the builder instance.
     *
     * @param Builder $builder
     * @param string  $value
     * @param string  $condition
     * @param string  $operator
     *
     * @return Builder $builder
     */
    public static function apply(
        Builder $builder,
        $value,
        $condition,
        $operator
    );
}