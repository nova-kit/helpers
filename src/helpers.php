<?php

namespace NovaKit;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use InvalidArgumentException;
use Laravel\Nova\Http\Requests\ActionRequest;

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
 * Convert large id higher than Number.MAX_SAFE_INTEGER to string.
 *
 * https://stackoverflow.com/questions/47188449/json-max-int-number/47188576
 *
 * @param  mixed  $value
 * @return mixed
 */
function id($value)
{
    if (is_int($value) && $value >= 9007199254740991) {
        return (string) $value;
    }

    return $value;
}

/**
 * Determine running action request.
 */
function running_action(Request $request): bool
{
    return $request instanceof ActionRequest;
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

/**
 * Get schemaless URL.
 *
 * @param  string  $url
 */
function schemaless_url($url): string
{
    return \ltrim(\str_replace(['https://', 'http://'], '//', \url($url)), '/');
}
