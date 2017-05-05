<?php
namespace SafoorSafdar\Filterable\Operators;

use Illuminate\Database\Eloquent\Builder;

/**
 * Class Operator
 *
 * @package SafoorSafdar\Filterable\Operators
 */
abstract class Operator
{
    /**
     * @var array
     */
    protected $list
        = [
            "NOT_EMPTY"                       => 'not empty',
            "NOT_NULL"                        => 'not null',
            "EMPTY"                           => 'empty',
            "NULL"                            => 'null',
            "CONTAINS_CASE_SENSITIVE"         => 'contains case sensitive',
            "CONTAINS"                        => 'contains',
            "DOES_NOT_CONTAIN_CASE_SENSITIVE" => 'does not contain case sensitive',
            "DOES_NOT_CONTAIN"                => 'does not contain',
            "EQUAL_CASE_SENSITIVE"            => 'equal case sensitive',
            "EQUAL"                           => 'equal',
            "NOT_EQUAL_CASE_SENSITIVE"        => 'not equal case sensitive',
            "NOT_EQUAL"                       => 'not equal',
            "GREATER_THAN"                    => 'greater than',
            "LESS_THAN"                       => 'less than',
            "GREATER_THAN_OR_EQUAL"           => 'greater than or equal',
            "LESS_THAN_OR_EQUAL"              => 'less than or equal',
            "STARTS_WITH_CASE_SENSITIVE"      => 'starts with case sensitive',
            "STARTS_WITH"                     => 'starts with',
            "ENDS_WITH_CASE_SENSITIVE"        => 'ends with case sensitive',
            "ENDS_WITH"                       => 'ends with',
        ];

    /**
     * @param Builder $builder
     * @param String  $field
     * @param String  $value
     * @param String  $operator
     *
     * @return mixed
     */
    abstract public function resolve(
        Builder $builder,
        $field,
        $value,
        $operator
    );

    protected function resolveOperator($operator)
    {
        return ($operator == 'or') ? 'orWhere' : 'where';
    }
}