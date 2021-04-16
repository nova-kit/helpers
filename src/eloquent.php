<?php

namespace NovaKit;

use Illuminate\Database\Eloquent\Model;
use InvalidArgumentException;

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
