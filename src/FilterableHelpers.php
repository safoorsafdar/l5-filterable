<?php

namespace SafoorSafdar\Filterable;

/**
 * Class FilterableHelpers
 *
 * @package SafoorSafdar\Filterable
 */
trait FilterableHelpers
{

    public static function parseDateValue($value)
    {
        $oValue = carbon()->now();
        if (self::validateDateShort($value)) {
            $oValue
                = carbon()->createFromFormat(config('filterable.date_format_short'),
                $value);
        } else if (self::validateDate($value)) {
            $oValue
                = carbon()->createFromFormat(config('filterable.date_format'),
                $value);

        } elseif (_interval($value) instanceof Carbon) {
            $oValue = _interval($value);
        } else {
            $oValue = $value;
        }

        return ($oValue instanceof Carbon) ? $oValue->toDateString() : $value;
    }

    /**
     * @param $value
     *
     * @return bool
     */
    private static function validateDateShort($value)
    {
        return \DateTime::createFromFormat(config('filterable.date_format_short'),
            $value) !== false;
    }

    /**
     * @param $value
     *
     * @return bool
     */
    private static function validateDate($value)
    {
        return \DateTime::createFromFormat(config('filterable.date_format'),
            $value) !== false;
    }
}
