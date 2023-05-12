<?php

namespace NovaKit;

use Illuminate\Http\Request;
use Laravel\Nova\Http\Requests\ActionRequest;
use Laravel\Nova\Http\Requests\NovaRequest;

/**
 * Convert RGBA color to RGB.
 *
 * @param  string  $foreground
 * @param  string  $background
 * @return string
 */
function color(string $foreground, string $background): string
{
    $palletes = ['light' => '255, 255, 255', 'dark' => '12, 74, 110'];

    $background = $palletes[$background] ?? $background;

    $rgba = function ($color) {
        return tap(
            array_map(function ($value) {
                return (float) $value;
            }, explode(',', str_replace(' ', '', $color))),
            function (&$color) {
                if (count($color) === 3) {
                    $color[] = 1;
                }
            }
        );
    };

    [$fR, $fG, $fB, $alpha] = $rgba($foreground);

    if ((float) $alpha >= 1.0) {
        return "{$fR}, {$fG}, {$fB}";
    }

    [$bR, $bG, $bB] = $rgba($background);

    $convert = function ($foreground, $background) use ($alpha) {
        return round(((1 - (float) $alpha) * (int) $background) + ((float) $alpha * (int) $foreground));
    };

    return "{$convert($fR, $bR)}, {$convert($fG, $bG)}, {$convert($fB, $bB)}";
}

/**
 * Determine Resource ID from the request.
 *
 * @param  callable|null  $default
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
 * @template TReturnValue int|string|null
 *
 * @param  (callable(): (TReturnValue)|mixed  $default
 * @return TReturnValue
 */
function request_attachable_resource(NovaRequest $request, string $resource, $default = null)
{
    if ($request->relatedResource === $resource && ! \is_null($request->relatedResourceId)) {
        return $request->relatedResourceId;
    }

    return request_resource($request, $resource, $default);
}

/**
 * Determine NovaRequest is currently Running an Action Request.
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
