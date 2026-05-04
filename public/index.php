<?php

/**
 * NataPHP Framework
 * Copyright (c) 2015 Sérgio Dinis Lopes. (http://nataphp.com)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) 2015 Sérgio Dinis Lopes. (http://nataphp.com)
 * @link          http://nataphp.com NataPHP Project
 * @since         NataPHP 1.0.0
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

use Nata\Http\Server;
use App\Application;
use Nata\Core\ClassLoader;

/**
 * Basic constants.
 */
    define('DS', DIRECTORY_SEPARATOR);
    define('ROOT', dirname(__DIR__) . DS);
    define('APP_DIR', 'src');
    define('APP', ROOT . APP_DIR . DS);
    define('TMP', ROOT . 'var' . DS);
    define('LOGS', TMP . 'logs' . DS);

    $composerAutoload = ROOT . 'vendor' . DS . 'autoload.php';
    if (!is_file($composerAutoload)) {
        http_response_code(503);
        header('Content-Type: text/plain; charset=UTF-8');
        exit('Composer dependencies missing. Run `composer install` from the project root.');
    }
    require $composerAutoload;

/**
 * Full url prefix.
 */
if (!defined('FULL_BASE_URL')) {
    $s = null;
    if (env('HTTPS')) {
        $s = 's';
    }

    $httpHost = env('HTTP_HOST');
    if (isset($httpHost)) {
        define('FULL_BASE_URL', 'http' . $s . '://' . $httpHost);
    }

    unset($httpHost, $s);
}

/**
 * Generated in...
 */
gentime();

/**
 * Register ClassLoader autoload.
 */
ClassLoader::register();

/**
 * Start the magic.
 */
(new Server(new Application(ROOT . 'config' . DS)))->run();
