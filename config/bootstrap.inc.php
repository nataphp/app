<?php

use Nata\Cache\Cache;
use Nata\I18n\I18n;
use Nata\Core\Configure;

/**
 * Project configuration
 */
    Configure::write('Config', [
        'name' => env('APP_NAME', 'NataPHP App'),
    ]);

/**
 * Load plugins (explicit paths).
 */
    require __DIR__ . '/plugins.php';

/**
 * I18n
 */
    // Configure::write('I18n.localeRoots', [
    //     ROOT . 'resources' . DS . 'locales',
    // ]);
    // I18n::defaultLocale('en');
    // I18n::locale('en');

/**
 * Mailer
 */
    // Configure::write('Email', [
    //     'Mailer' => [
    //         'default' => [
    //             'from' => 'App <hello@example.com>',
    //             'contentType' => 'text/html',
    //             'transport' => [
    //                 'className' => 'Smtp',
    //                 'host' => env('MAIL_HOST', 'localhost'),
    //                 'port' => env('MAIL_PORT', 587),
    //             ]
    //         ]
    //     ]
    // ]);

/**
 * Cache
 */
    Cache::config('default', [
        'engine' => ['File'],
        'duration' => 60,
        'probability' => 90,
        'prefix' => 'app_',
    ]);

/**
 * View
 */
    Configure::write('View', [
        'cache' => [
            'disabled' => Configure::read('development'),
        ],
        'minifyHtml' => !Configure::read('development'),
        'type' => 'html',
    ]);

/**
 * Session
 */
    Configure::write('Session', [
        'ini' => [
            'session.save_path' => ROOT . 'var' . DS . 'sessions',
        ],
    ]);

/**
 * Security
 */
    Configure::write('Security', [
        'level' => 'medium',
        'salt' => env('APP_SECURITY_SALT', 'changeme'),
    ]);

/**
 * Auth
 */
    // Configure::write('Auth', [
    //     'disabled' => false,
    //     'loginAction' => ['controller' => 'users', 'action' => 'login'],
    //     'logoutAction' => ['controller' => 'users', 'action' => 'login'],
    //     'redirectUrl' => '/',
    //     'handler' => 'Form',
    // ]);

/**
 * Routing
 */
    Configure::write('Routing', [
        'prefixes' => []
    ]);
