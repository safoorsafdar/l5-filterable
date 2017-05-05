<?php

namespace SafoorSafdar\Filterable\Operators;

use Illuminate\Database\Eloquent\Builder;

class DoesNotContainCaseSensitiveOperator extends Operator
{
    public function resolve(Builder $builder, $field, $value, $operator)
    {
        return $builder->{$this->resolveOperator($operator)}(\DB::raw('BINARY `'
            .$field.'`'),
            "NOT LIKE",
            "%".$value."%");
    }
}