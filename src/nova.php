<?php

namespace NovaKit;

use Illuminate\Http\Request;
use Laravel\Nova\Http\Requests\ActionRequest;
use Laravel\Nova\Http\Requests\NovaRequest;

/**
 * Determine Resource ID from the request.
 *
 * @param  callable|null  $default
 *
 * @return int|string|null
 */
function request_resource(NovaRequest $request, string $resource, $default = null)
{
    if ($request->resource === $resource && ! \is_null($request->resourceId)) {
        return $request->resource;
    }

    return value($default);
}

/**
 * Determine attachable Resource ID from the request.
 *
 * @param  callable|null  $default
 *
 * @return int|string|null
 */
function request_attachable_resource(NovaRequest $request, string $resource, $default = null)
{
    if ($request->relatedResource === $resource && ! \is_null($request->relatedResourceId)) {
        return $request->relatedResourceId;
    }

    return request_resource($request, $resource, $default);
}

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
