<?php
function kirby_sentry() {
    if (($sentryDsn = c::get('sentry.dsn', false)) && !c::get('sentry.disabled', false)) {
        require_once __DIR__ . '/sentry-php/lib/Raven/Autoloader.php';
        Raven_Autoloader::register();

        $client = new Raven_Client($sentryDsn);

        if ($user = site()->user()) {
            $client->user_context(array(
                'id' => $user->username(),
                'username' => $user->firstName() . ' ' . $user->lastName(),
                'email' => $user->email(),
            ));
        }

        $error_handler = new Raven_ErrorHandler($client);
        $error_handler->registerExceptionHandler();
        $error_handler->registerErrorHandler();
        $error_handler->registerShutdownFunction();
        
        return $client;
    } else {
        if (!$sentryDsn) {
            trigger_error('Sentry DSN not defined', E_USER_NOTICE);
        }
    }
}
