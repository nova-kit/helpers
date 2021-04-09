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

#### Get Qualify Column Name

```php
new NovaKit\column_name(string|\Illuminate\Database\Eloquent\Model $model, string $attribute): string;
```

The function generate qualified column name for an eloquent model:

```php
return NovaKit\column_name(App\Models\User::class, 'email');
```

#### Eloquent Exists

```php
new NovaKit\eloquent_exists(\Illuminate\Database\Eloquent\Model|mixed $model): bool;
```

The function checks if given `$model` is an instance of `Illuminate\Database\Eloquent\Model` and it exists in the database:


```php
$user = App\Models\User::find(5);

return NovaKit\eloquent_exists($user);
```

#### Get Table Name

```php
new NovaKit\table_name(string|\Illuminate\Database\Eloquent\Model $model): string;
```

The function generate table name for an eloquent model:

```php
return NovaKit\table_name(App\Models\User::class);
```
