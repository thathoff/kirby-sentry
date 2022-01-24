<?php

@include_once __DIR__ . '/vendor/autoload.php';

use function Sentry\init;
use function Sentry\captureException;
use function Sentry\configureScope;
use Sentry\State\Scope;

Kirby::plugin("thathoff/sentry", [
    'config' => [
        'dsn' => null,
        'environment' => 'production',
        'addUserContext' => true,
    ],
    'hooks' => [
        'system.exception' => function ($exception) {
            $dsn = option('thathoff.sentry.dsn');

            // when no dsn is configured we do nothing
            if (!$dsn) {
                return;
            }

            // init and configure sentry
            init([
                'dsn' => $dsn,
                'environment' => option('thathoff.sentry.environment', 'production'),
            ]);

            // attach user context if enabled
            if (
                option('thathoff.sentry.addUserContext', true) &&
                $user = kirby()->user()
            ) {
                configureScope(function (Scope $scope) use ($user) {
                    $scope->setUser([
                        'email' => (string)$user->email(),
                        'username' => (string)$user->name(),
                    ]);
                });
            }

            // capture exception and send to sentry
            captureException($exception);
        }
    ],
]);
