<?php
    /**
     * Number helpers for Handlebars
     * PHP implementation of handlebars-helpers number.js
     */
    return [
        /**
         * Format a number to its equivalent in bytes. If a string is passed,
         * its length will be formatted and returned.
         *
         * Examples:
         * - 'foo' => 3 B
         * - 13661855 => 13.66 MB
         * - 825399 => 825.39 kB
         * - 1396 => 1.4 kB
         *
         * @param mixed $number Number or string to convert
         * @param int $precision Number of decimal places (default: 2)
         * @return string Formatted byte representation
         */
        'bytes' => function($number, $precision = 2) {
            if ($number === null) {
                return '0 B';
            }

            // If not a number, use string length
            if (!is_numeric($number)) {
                $number = strlen($number);
                if (!$number) {
                    return '0 B';
                }
            }

            // Ensure precision is numeric
            if (!is_numeric($precision)) {
                $precision = 2;
            }

            $abbr = ['B', 'kB', 'MB', 'GB', 'TB', 'PB', 'EB', 'ZB', 'YB'];
            $precision = pow(10, $precision);
            $number = (float)$number;
            $len = count($abbr) - 1;

            while ($len >= 0) {
                $size = pow(10, $len * 3);
                if ($size <= ($number + 1)) {
                    $number = round($number * $precision / $size) / $precision;
                    $number .= ' ' . $abbr[$len];
                    break;
                }
                $len--;
            }

            return $number;
        }
    ];
?>
