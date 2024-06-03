<?php
    namespace HandlebarsHelpers;

    class Helpers
    {
        public static function all(): array
        {
            return [
                'string' => require_once 'string.php',
                'comparison' => require_once 'comparison.php'
            ];
        }
    }
?>