<?php

namespace NovaKit;

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

    if (! \preg_match(VALID_COLUMN_NAME_REGEX, $column)) {
        return false;
    }

    return true;
}

/**
 * Convert large id higher than Number.MAX_SAFE_INTEGER to string.
 *
 * https://stackoverflow.com/questions/47188449/json-max-int-number/47188576
 *
 * @param  mixed  $value
 *
 * @return int|string
 */
function safe_int($value)
{
    if (is_int($value) && abs($value) < 9007199254740991) {
        return $value;
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
    return \ltrim(\str_replace(['https://', 'http://'], '//', \url($url)), '/');
}