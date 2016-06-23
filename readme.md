# Kirby - Sentry plugin

This is a plugin for [Kirby](http://getkirby.com/) that logs erros to [Sentry](https://getsentry.com).

## Installation

```
git submodule add --name sentry-kirby https://github.com/blankogmbh/kirby-sentry site/plugins/sentry-kirby
git submodule update --init --recursive
```

Add your Sentry DSN to the **site/config/config.php**:

```php
// https://<key>:<secret>@app.getsentry.com/<project>
c::set('sentry.PUBLIC_KEY', '<key>');
c::set('sentry.SECRET_KEY', '<secret>');
c::set('sentry.HOST', 'app.getsentry.com');
c::set('sentry.PATH', '/');
c::set('sentry.PROJECT_ID', '<project>');
c::set('sentry.dsn', 'https://' . c::get('sentry.PUBLIC_KEY') . ':' . c::get('sentry.SECRET_KEY') . '@' . c::get('sentry.HOST') . c::get('sentry.PATH') . c::get('sentry.PROJECT_ID')); // Do Not Change
c::set('sentry.dsn_public', 'https://' . c::get('sentry.PUBLIC_KEY') . '@' . c::get('sentry.HOST') . c::get('sentry.PATH') . c::get('sentry.PROJECT_ID')); // Do Not Change
```

### Javascript logging

Add this to your site/snippets/footer.php, [after any other libraries are included, but before your own scripts](https://docs.getsentry.com/hosted/clients/javascript/install/)

```
 <?php if (
    ($sentryDsn_public = c::get('sentry.dsn_public'))
    && !c::get('sentry.disabled', false)
): ?>
    <?= js('https://cdn.ravenjs.com/3.0.4/raven.min.js') ?>
    <script>Raven.config('<?= $sentryDsn_public ?>').install()</script>
<?php endif ?>
```

## Options

You can use the following [Options](http://getkirby.com/docs/advanced/options) - make use of kirbys [Multi-environment setup](http://getkirby.com/blog/multi-environment-setup).

#### sentry.disabled
Type: `boolean`
Default value: `false`

disable the sentry plugin

### sentry.PUBLIC_KEY
Type: `String`
Default value: `<key>`

### sentry.SECRET_KEY
Type: `String`
Default value: `<secret>`

### sentry.HOST
Type: `String`
Default value: `app.getsentry.com`

### sentry.PATH
Type: `String`
Default value: `/`

### sentry.PROJECT_ID
Type: `String`
Default value: `<project>`

### sentry.dsn
Type: `String`

Do not change this value, it will be generated automatically.
Your Sentry DSN, keep this secret.

### sentry.dsn_public
Type: `String`

Do not change this value, it will be generated automatically.
Your public Sentry DSN, you can use this for Javascript e.g.
