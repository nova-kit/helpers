<?php

namespace NovaKit;

use Illuminate\Support\Str;

const MAX_COLUMN_NAME_LENGTH = 64;
const VALID_COLUMN_NAME_REGEX = '/^(?![0-9])[A-Za-z0-9_-]*$/';

/**
 * Check if column name is valid.
 *
 * @param  mixed  $column
 */
function is_column_name($column): bool
{
    if (empty($column) || \strlen($column) > MAX_COLUMN_NAME_LENGTH) {
        return false;
    }

    if (! preg_match(VALID_COLUMN_NAME_REGEX, $column)) {
        return false;
    }

    return true;
}

/**
 * Check if locale should be RTL.
 */
function is_rtl(): bool
{
    return Str::startsWith(app()->currentLocale(), [
        'ar',     // Arabic
        'arc',    // Aramaic
        'ckb',    // Kurdish (Sorani)
        'dv',     // Divehi
        'fa',     // Persian
        'ha',     // Hausa
        'he',     // Hebrew
        'khw',    // Khowar
        'ks',     // Kashmiri
        'ps',     // Pashto
        'sd',     // Sindhi
        'ur',     // Urdu
        'uz_AF',  // Uzbeki Afghanistan
        'yi',     // Yiddish
    ]);
}

/**
 * Convert large id higher than Number.MAX_SAFE_INTEGER to string.
 *
 * https://stackoverflow.com/questions/47188449/json-max-int-number/47188576
 *
 * @param  mixed  $value
 * @return int|string
 */
function safe_int($value)
{
    $jsonMaxInt = 9007199254740991;

    if (\is_int($value) && abs($value) < $jsonMaxInt) {
        return $value;
    } elseif (filter_var($value, FILTER_VALIDATE_INT) && abs($value) < $jsonMaxInt) {
        return (int) $value;
    }

    return (string) $value;
}

/**
 * Get schemaless URL.
 *
 * @param  string  $url
 */
function schemaless_url($url): string
{
    return ltrim(str_replace(['https://', 'http://'], '//', url($url)), '/');
}
