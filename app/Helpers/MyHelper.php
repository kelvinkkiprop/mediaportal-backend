<?php

namespace App\Helpers;

if (! function_exists('views_human_number')) {
    /**
     * Convert number to human readable short form and append "view" or "views".
     *
     * Example:
     *  1    -> "1 view"
     *  1700 -> "1.7K views"
     *
     * @param  int|float  $number
     * @param  int  $precision  Number of decimal places (default: 1)
     * @return string
     */
    function views_human_number(int|float $number, int $precision = 1): string
    {
        $number = (float) $number;
        // Decide_view_or_views
        $label = ($number == 1) ? 'view' : 'views';
        if ($number < 1000) {
            return intval($number) . ' ' . $label;
        }

        $units = ['', 'K', 'M', 'B', 'T'];
        $power = (int) floor(log($number, 1000));
        $power = min($power, count($units) - 1);
        $value = $number / (1000 ** $power);

        // Format_and_clean_up_trailing_zeros
        $formatted = number_format($value, $precision, '.', '');
        $formatted = rtrim(rtrim($formatted, '0'), '.');
        return $formatted . $units[$power] . ' ' . $label;
    }
}
