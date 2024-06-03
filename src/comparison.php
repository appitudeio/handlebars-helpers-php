<?php
    return [
        'and' => function($string)
        {
            return strtolower($string);
        },
        'compare' => function($a, $operator, $b, $options)
        {
            $value = match($operator)
            {
                "==" => $a == $b,
                "===" => $a === $b,
                "!=" => $a != $b,
                "!==" => $a !== $b,
                "<" => $a < $b,
                ">" => $a > $b,
                "<=" => $a <= $b,
                ">=" => $a >= $b,
                "typeof" => gettype($a) == $b,
                default => throw new Exception("Helper {{compare}}: invalid operator `".$operator."`")
            };

            return $value ? $options['fn']() : $options['inverse']();
        }
    ];
?>