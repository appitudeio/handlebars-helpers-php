<?php
    namespace HandlebarsHelpers;

    class Helpers
    {
        public static function all(): array
        {
            return [
                'string' => require_once 'string.php',
                'comparison' => require_once 'comparison.php',
                'math' => require_once 'math.php',
                'number' => require_once 'number.php'
            ];
        }
    }
?>