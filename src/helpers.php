<?php
if ( ! function_exists('carbon')) {
    function carbon($time = null, $tz = null)
    {
        return new \Carbon\Carbon($time, $tz);
    }
}
if ( ! function_exists('_interval')) {
    function _interval($what)
    {
        $carbon          = carbon();
        $dateFilterValue = array(
            "now"         => ['func' => 'now'],
            "yesterday"   => ['func' => 'yesterday'],
            "today"       => ['func' => 'today'],
            "tomorrow"    => ['func' => 'tomorrow'],
            "lastweek"    => [
                'func' => 'subWeek',
                'pre'  => "now",
                'post' => "startOfWeek",
            ],
            "thisweek"    => [
                'func' => 'startOfWeek',
                'pre'  => "now",
                'post' => "startOfWeek",
            ],
            "nextweek"    => [
                'func' => 'addWeek',
                'pre'  => "now",
                'post' => "startOfWeek",
            ],
            "lastmonth"   => [
                'func' => 'subMonth',
                'pre'  => "now",
                'post' => "startOfMonth",
            ],
            "thismonth"   => [
                'func' => 'startOfMonth',
                'pre'  => "now",
                'post' => "startOfMonth",
            ],
            "nextmonth"   => [
                'func' => 'addMonth',
                'pre'  => "now",
                'post' => "startOfMonth",
            ],
            "last7days"   => [
                'func'  => 'subDays',
                'pre'   => "now",
                'value' => 7,
            ],
            "last30days"  => [
                'func'  => 'subDays',
                'pre'   => "now",
                'value' => 30,
            ],
            "last60days"  => [
                'func'  => 'subDays',
                'pre'   => "now",
                'value' => 60,
            ],
            "last90days"  => [
                'func'  => 'subDays',
                'pre'   => "now",
                'value' => 90,
            ],
            "last120days" => [
                'func'  => 'subDays',
                'pre'   => "now",
                'value' => 120,
            ],
            "next30days"  => [
                'func'  => 'addDays',
                'pre'   => "now",
                'value' => 30,
            ],
            "next60days"  => [
                'func'  => 'addDays',
                'pre'   => "now",
                'value' => 60,
            ],
            "next90days"  => [
                'func'  => 'addDays',
                'pre'   => "now",
                'value' => 90,
            ],
            "next120days" => [
                'func'  => 'addDays',
                'pre'   => "now",
                'value' => 120,
            ],
        );

        if (array_key_exists($what, $dateFilterValue)) {
            $object = $carbon;
            if (array_key_exists('pre', $dateFilterValue[$what])) {
                $object = $object->{$dateFilterValue[$what]['pre']}();
            }

            if (array_key_exists('func', $dateFilterValue[$what])) {
                if ( ! array_key_exists('value', $dateFilterValue[$what])) {
                    $object = $object->{$dateFilterValue[$what]['func']}();
                }

                if (array_key_exists('value', $dateFilterValue[$what])) {
                    $object
                        = $object->{$dateFilterValue[$what]['func']}($dateFilterValue[$what]['value']);
                }
            }
            if (array_key_exists('post', $dateFilterValue[$what])) {
                $object = $object->{$dateFilterValue[$what]['post']}();
            }

            return $object;
        }

        return $what;
    }
}