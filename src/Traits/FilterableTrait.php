<?php
namespace SafoorSafdar\Filterable\Traits;

use SafoorSafdar\Filterable\FilterFactory;

trait FilterableTrait
{
    public function scopeApplyFilter($query, $toFilters, $condition = 'where')
    {
        $search = new FilterFactory(self::getFilters());
        $search->apply($query, $toFilters, $condition);
    }

    public static function getFilters()
    {
        return self::$filters;
    }

    public static function getFilterLang()
    {
        if (property_exists(self::class, 'filterLang')) {
            return self::$filterLang;
        }

        return strtolower(class_basename(get_class()));
    }

    public static function filterableAttributes()
    {
        $module = self::getFilterLang();

        $fields     = collect([]);
        $collection = collect(self::getFilters())
            ->reject(function ($filter) {
                return ! class_exists($filter);
            })->flip()
            ->flatten();
        $collection->map(function ($field) use ($fields, $module) {
            $contract = explode("__", $field);
            if (is_array($contract) and count($contract) > 1) {
                if (\Lang::has($contract[0].".label.".$contract[1], app()->getLocale())) {
                    $heading = table_basename(ucfirst($contract[0]))."::"
                        .trans(table_basename($contract[0]).".label.".$contract[1]);
                    $fields->put($field, $heading);
                }
            }
            if (\Lang::has($module.'.label.'.$contract[0], app()->getLocale())) {
               $fields->put($field, trans($module.'.label.'.$contract[0]));
           }
        });
        return $fields;
    }
}