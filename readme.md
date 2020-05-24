# Kirby - Sentry plugin

This is a plugin for [Kirby](http://getkirby.com) that logs errors to [Sentry](https://getsentry.com).

## Installation

`composer require thathoff/kirby-sentry`

Add your Sentry DSN to the **site/config/config.php**:

```php
c::set('sentry.dsn', 'https://<key>:<secret>@<host>/<project>');
c::set('sentry.dsn_public', 'https://<key>@<host>/<project>');
```

### Javascript logging

Add this to your **site/snippets/footer.php**, [after any other libraries are included, but before your own scripts](https://docs.getsentry.com/hosted/clients/javascript/install)

```php
 <?php if (
    ($sentryDsn_public = c::get('sentry.dsn_public'))
    && !c::get('sentry.disabled', false)
): ?>
    <?= js('https://cdn.ravenjs.com/3.0.4/raven.min.js') ?>
    <script>Raven.config('<?= $sentryDsn_public ?>').install()</script>
<?php endif ?>
```

## Options

You can use the following [Options](http://getkirby.com/docs/advanced/options) - make use of Kirby's [multi-environment setup](http://getkirby.com/blog/multi-environment-setup).

### sentry.disabled
Type: `boolean`
Default value: `false`

Disable the sentry plugin

### sentry.dsn
Type: `String`

Do not change this value, it will be generated automatically.
Your Sentry DSN, keep this secret.

### sentry.dsn_public
Type: `String`

Do not change this value, it will be generated automatically.
Your public Sentry DSN, you can use this for Javascript e.g.
