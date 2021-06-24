Useful helpers for Laravel Nova
==============

[![tests](https://github.com/nova-kit/helpers/workflows/tests/badge.svg?branch=master)](https://github.com/nova-kit/helpers/actions?query=workflow%3Atests+branch%3Amaster)
[![Latest Stable Version](https://poser.pugx.org/nova-kit/helpers/v/stable)](https://packagist.org/packages/nova-kit/helpers)
[![Total Downloads](https://poser.pugx.org/nova-kit/helpers/downloads)](https://packagist.org/packages/nova-kit/helpers)
[![Latest Unstable Version](https://poser.pugx.org/nova-kit/helpers/v/unstable)](https://packagist.org/packages/nova-kit/helpers)
[![License](https://poser.pugx.org/nova-kit/helpers/license)](https://packagist.org/packages/nova-kit/helpers)
[![Coverage Status](https://coveralls.io/repos/github/nova-kit/helpers/badge.svg?branch=master)](https://coveralls.io/github/nova-kit/helpers?branch=master)


## Installation

To install through composer, run the following command from terminal:

```bash
composer require "nova-kit/helpers"
```

## Usages

### Eloquent

#### Get Qualified Column Name

```php
NovaKit\column_name(string|\Illuminate\Database\Eloquent\Model $model, string $attribute): string;
```

The function generate qualified column name for an eloquent model:

```php
use function NovaKit\column_name;

return column_name(App\Models\User::class, 'email');
```

#### Eloquent Exists

```php
NovaKit\eloquent_exists(\Illuminate\Database\Eloquent\Model|mixed $model): bool;
```

The function checks if given `$model` is an instance of `Illuminate\Database\Eloquent\Model` and it exists in the database:


```php
use App\Models\User;
use function NovaKit\eloquent_exists;

$user = User::find(5);

return eloquent_exists($user);
```

#### Observe Eloquent

```php
NovaKit\observe_eloquent(string $model, string|object $observer): void;
```

The function will register observer for given `$model` class name and flush the requirements before handling next request on Laravel Octane.

```php
use App\Models\User;
use App\Observers\UserObserver;
use Laravel\Nova\Nova;
use function NovaKit\observe_eloquent;

Nova::serving(function () {
    observe_eloquent(User::class, new UserObserver());
});
```

#### Get Table Name

```php
NovaKit\table_name(string|\Illuminate\Database\Eloquent\Model $model): string;
```

The function generate table name for an eloquent model:

```php
use function NovaKit\table_name;

return table_name(App\Models\User::class);
```

### Nova Request Helpers

#### Has Ordering

```php
NovaKit\has_ordering(\Laravel\Nova\Http\Requests\NovaRequest $request): bool;
```

Determine if current Request has any ordering.

```php
use Laravel\Nova\Http\Requests\NovaRequest;
use function NovaKit\has_ordering;

public static function indexQuery(NovaRequest $request, $query)
{
    if (! has_ordering($request)) {
        $query->orderBy('name');
    }
}
```

#### Running Action

```php
NovaKit\running_action(\Illuminate\Http\Request $request, ?string $action): bool;
```

```php
use Illuminate\Http\Request;
use Laravel\Nova\Http\Requests\NovaRequest;

public function authorizedToUpdate(Request $request)
{
    if (running_action($request, 'open-on-platform')) {
        return $request->user()->canModerateResources();
    }

    return $this->authorizedTo($request, 'update');
}
```

### Common Helpers

#### Validate Column Name

```php
NovaKit\is_column_name(mixed $column): bool;
```

Validate if given `$column` is a valid column name.

```php
use function NovaKit\is_column_name;

if (is_column_name($request->query('sortBy'))) {
    $query->latest($request->query('sortBy'));
}
```

#### Safe Integer

```php
NovaKit\safe_int(mixed $value): int|string;
```

Convert large id higher than JavaScript's `Number.MAX_SAFE_INTEGER` to string.

```php
use function NovaKit\safe_int;

return safe_int(9007199254741001); // will return "9007199254741001"
```

#### Schemaless URL

```php
NovaKit\schemaless_url(string $url): string;
```

Get schemaless URL for given `$url`

```php
use function NovaKit\schemaless_url;

return schemaless_url('https://github.com'); // will return "github.com"
