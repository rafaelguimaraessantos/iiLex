<?php
    class ConverterTempo {
        private static $unitMap = [
            'day' => 24,
            'days' => 24,
            'week' => 168,
            'weeks' => 168,
            'month' => 720,
            'months' => 720,
            'year' => 8760,
            'years' => 8760
        ];

        public static function toHours($consumables) {
            preg_match('/(\d+)\s+(\w+)/', strtolower($consumables), $matches);
            if (!$matches) return 0;

            [$_, $value, $unit] = $matches;

            return ((int)$value) * (self::$unitMap[$unit] ?? 0);
        }
    }
?>