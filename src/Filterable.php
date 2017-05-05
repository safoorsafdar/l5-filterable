<?php

namespace SafoorSafdar\Filterable;

/**
 * Class Filterable
 *
 * @package SafoorSafdar\Filterable
 */
class Filterable
{

    public static function operators()
    {
        return [
            // "0" => '-- Select --',
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
    }
}
