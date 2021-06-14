<?php

namespace NovaKit;

use Illuminate\Http\Request;
use Laravel\Nova\Http\Requests\ActionRequest;
use Laravel\Nova\Http\Requests\NovaRequest;

/**
 * Determine running action request.
 */
function running_action(Request $request, ?string $action = null): bool
{
    if (! $request instanceof ActionRequest) {
        return false;
    }

    return \is_null($action) ? true : $request->query('action') === $action;
}

/**
 * Determine if request has ordering.
 */
function has_ordering(NovaRequest $request): bool
{
    return ! empty($request->orderByDirection);
}
