<?php

namespace SafoorSafdar\Filterable\Operators;

use Illuminate\Database\Eloquent\Builder;

class StartsWithCaseSensitiveOperator extends Operator
{
    public function resolve(Builder $builder, $field, $value, $operator)
    {
        return $builder->{$this->resolveOperator($operator)}(\DB::raw('BINARY `'
            .$field.'`'),
            "LIKE",
            $value."%");
    }
}