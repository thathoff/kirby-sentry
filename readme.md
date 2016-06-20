# Kirby - Sentry plugin

This is a plugin for [Kirby](http://getkirby.com/) that logs erros to [Sentry](https://getsentry.com).

## Installation

```
git submodule add --name sentry-kirby https://github.com/blankogmbh/kirby-sentry site/plugins/sentry-kirby
git submodule update --init --recursive
```

Add your Sentry DSN to the **site/config/config.php**:

`c::set('sentry.dsn', 'https://<key>:<secret>@app.getsentry.com/<project>');`
