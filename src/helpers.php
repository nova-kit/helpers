<?php

namespace NovaKit;

use Illuminate\Database\Eloquent\Model;

/**
 * Check whether given $eloquent exists.
 *
 * @param  \Illuminate\Database\Eloquent\Model|mixed  $eloquent
 */
function model_exists($eloquent): bool
{
    return $eloquent instanceof Model && $eloquent->exists === true;
}
