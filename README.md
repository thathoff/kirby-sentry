# Kirby Sentry Plugin

This is a plugin for [Kirby](http://getkirby.com) (> 3.6.1) that logs errors and exceptions to
[Sentry](https://sentry.io/) and other Sentry compatible error trackers (eg. GitLab).

⚠️ **Please Note:** Kirby versions before 3.6.1 are not supported because the `system.exception` hook is only available
since Kirby 3.6.1.

## Installation

### With Composer

`composer require thathoff/kirby-sentry`

### Manual Installation

- [Download this plugin](https://github.com/thathoff/kirby-sentry/archive/refs/heads/master.zip)
- Extract the archive
- Move folder into the `site/plugins` directory
- Run `composer install` inside this folder to install the Sentry SDK required by the plugin

## Configuration

The following configuration options are available in this plugin. Add them to your `site/config/config.php`

### DSN

This option is required. When not set the plugin is disabled. To obtain the DSN create a new Sentry project of type PHP.

Default: `null`

```php
'thathoff.sentry.dsn' => "https://df2c6f7afc1a58783e15f2ae0118ff039d8a4755@0123456.ingest.sentry.io/123456",
```

### Environment

You can configure an environment which is sent to Sentry. This can be eg. `staging` or any other string that helps you
to identify the environment the error happened in.

Tip: Use [Kirby multi environment setup](https://getkirby.com/docs/guide/configuration#multi-environment-setup) to
change this option.

Default: `'production'`

```php
'thathoff.sentry.environment' => 'production',
```

### Add User Context

When a Kirby user is logged in, the plugin sends the user’s email address and the users name to Sentry to track down
errors and exceptions to users.

To disable, set this option to `false`.

Default: `true`

```php
'thathoff.sentry.addUserContext' => true,
```
