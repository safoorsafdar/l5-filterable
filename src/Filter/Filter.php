<?php
namespace SafoorSafdar\Filterable\Filter;

use SafoorSafdar\Filterable\Contracts\FilterContract;

abstract class Filter implements FilterContract
{
    protected static function createOperatorDecorator($name)
    {
        return '\\SafoorSafdar\\Filterable\\Operators\\'.self::prepareClassName($name);
    }
    private static function prepareClassName($name){
        return ucwords(camel_case(strtolower($name))).'Operator';
    }

    protected static function isValidDecorator($decorator)
    {
        return class_exists($decorator);
    }
}