<?php

namespace SafoorSafdar\Filterable\Operators;

use Illuminate\Database\Eloquent\Builder;

class StartsWithOperator extends Operator
{
    public function resolve(Builder $builder, $field, $value,$operator)
    {
        return $builder->{$this->resolveOperator($operator)}($field, "LIKE",
            $value."%");
    }
}