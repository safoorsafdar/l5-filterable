<?php

namespace SafoorSafdar\Filterable;

use Illuminate\Database\Eloquent\Builder;

class FilterFactory
{
    protected $availableFilters;

    public function __construct($availableFilter)
    {
        $this->availableFilters = $availableFilter;
    }

    public function apply($query, $filters, $condition)
    {
        $newQuery = $this->applyDecorators(
            $filters, $query, $condition
        );

        return $newQuery;
    }

    private function applyDecorators(
        $filters,
        Builder $query,
        $condition
    ) {
        $query->{$condition}(function ($query) use ($filters) {
            foreach ($filters as $filter) {
                $filterField     = array_get($filter, 'field');
                $filterValue     = array_get($filter, 'value', '');
                $filterCondition = array_get($filter, 'condition', null);
                $filterOperator  = array_get($filter, 'operator', null);
                $filterDecorator = $this->createFilterDecorator($filterField);
                if ($this->isValidDecorator($filterDecorator)) {
                    app($filterDecorator)->apply($query, $filterValue,
                        $filterCondition, $filterOperator);
                }
            }

        });

        return $query;
    }

    private function createFilterDecorator($name)
    {
        return $this->availableFilters[$name];
    }

    private function isValidDecorator($decorator)
    {
        return class_exists($decorator);
    }

}