<?php

namespace App\Helpers;

class InputSanitizer
{
    /**
     * Sanitize a search query string.
     *
     * @param string $input
     * @return string
     */
    public static function sanitizeSearchQuery(string $input): string
    {
        $trimmed = trim($input);
        $stripped = strip_tags($trimmed);
        $removedUnderscores = str_replace('_', '', $stripped);
        $escaped = addcslashes($removedUnderscores, '%_');
        return $escaped;
    }

    /**
     * Sanitize numeric input.
     *
     * @param mixed $input
     * @return float|null Returns sanitized float or error if invalid
     */
    public static function sanitizeNumericQuery($input): float
    {
        $trimmed = trim((string) $input);

        if (!is_numeric($trimmed)) {
            throw new \InvalidArgumentException('Input must be a numeric value.');
        }

        $floatVal = (float) $trimmed;
        return $floatVal;
    }

    /**
     * Sanitize coordinate input.
     *
     * @param mixed $input
     * @return float|null Returns sanitized coordinate
     */

    public static function sanitizeLatitude($latitude): ?float
    { 
        $latitude = self::sanitizeNumericQuery($latitude);
        if ($latitude < -90 || $latitude > 90) {
            throw new \InvalidArgumentException('Latitude must be between -90 and 90.');
        }
        return $latitude;
    }

    public static function sanitizeLongitude($longitude): ?float
    { 
        $longitude = self::sanitizeNumericQuery($longitude);
        if ($longitude < -180 || $longitude > 180) {
            throw new \InvalidArgumentException('Longitude must be between -180 and 180.');
        }
        return $longitude;
    }

}
