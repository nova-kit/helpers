<?php

namespace NovaKit;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use InvalidArgumentException;
use Laravel\Nova\Http\Requests\ActionRequest;

const MAX_COLUMN_NAME_LENGTH = 64;
const VALID_COLUMN_NAME_REGEX = '/^(?![0-9])[A-Za-z0-9_-]*$/';

/**
 * Get qualify column name from Eloquent model.
 *
 * @param  string|\Illuminate\Database\Eloquent\Model  $model
 *
 * @throws \InvalidArgumentException
 */
function column_name($model, string $attribute): string
{
    if (\is_string($model)) {
        $model = new $model();
    }

    if (! $model instanceof Model) {
        throw new InvalidArgumentException(\sprintf('Given $model is not an instance of [%s].', Model::class));
    }

    return $model->qualifyColumn($attribute);
}

/**
 * Check whether given $model exists.
 *
 * @param  \Illuminate\Database\Eloquent\Model|mixed  $model
 */
function eloquent_exists($model): bool
{
    return $model instanceof Model && $model->exists === true;
}

/**
 * Check if column name is valid.
 *
 * @param  mixed  $column
 * @return bool
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
 * Determine running action request.
 */
function running_action(Request $request): bool
{
    return $request instanceof ActionRequest;
}

/**
 * Convert large id higher than Number.MAX_SAFE_INTEGER to string.
 *
 * https://stackoverflow.com/questions/47188449/json-max-int-number/47188576
 *
 * @param  mixed  $value
 * @return mixed
 */
function safe_int($value)
{
    if (is_int($value) && $value >= 9007199254740991) {
        return (string) $value;
    }

    return $value;
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

/**
 * Get table name from Eloquent model.
 *
 * @param  string|\Illuminate\Database\Eloquent\Model  $model
 *
 * @throws \InvalidArgumentException
 */
function table_name($model): string
{
    if (\is_string($model)) {
        $model = new $model();
    }

    if (! $model instanceof Model) {
        throw new InvalidArgumentException(\sprintf('Given $model is not an instance of [%s].', Model::class));
    }

    return $model->getTable();
}
