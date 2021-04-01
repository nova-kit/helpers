<?php

namespace NovaKit;

use Illuminate\Database\Eloquent\Model;
use InvalidArgumentException;

/**
 * Check whether given $eloquent exists.
 *
 * @param  \Illuminate\Database\Eloquent\Model|mixed  $eloquent
 */
function model_exists($eloquent): bool
{
    return $eloquent instanceof Model && $eloquent->exists === true;
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
    if (is_string($model)) {
        $model = new $model();
    }

    if (! $model instanceof Model) {
        throw new InvalidArgumentException(sprintf('Given $model is not an instance of [%s].', Model::class));
    }

    return $model->getTable();
}

/**
 * Get qualify column name from Eloquent model.
 *
 * @param  string|\Illuminate\Database\Eloquent\Model  $model
 *
 * @throws \InvalidArgumentException
 */
function column_name($model, string $attribute): string
{
    if (is_string($model)) {
        $model = new $model();
    }

    if (! $model instanceof Model) {
        throw new InvalidArgumentException(sprintf('Given $model is not an instance of [%s].', Model::class));
    }

    return $model->qualifyColumn($attribute);
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
