# Kirby - Sentry plugin

This is a plugin for [Kirby](http://getkirby.com/) that logs erros to [Sentry](https://getsentry.com).

## Installation

```
git submodule add --name sentry-kirby https://github.com/blankogmbh/kirby-sentry site/plugins/sentry-kirby
git submodule update --init --recursive
```

Add your Sentry DSN to the **site/config/config.php**:

```php
c::set('sentry.dsn', 'https://<key>:<secret>@app.getsentry.com/<project>');
```

## Options

You can use the following [Options](http://getkirby.com/docs/advanced/options) - make use of kirbys [Multi-environment setup](http://getkirby.com/blog/multi-environment-setup).

### sentry.dsn
Type: `String`
Default value: `false`

Your Sentry DSN, e.g. `https://<key>:<secret>@app.getsentry.com/<project>`

#### sentry.disabled
Type: `boolean`
Default value: `false`

disable the sentry plugin
