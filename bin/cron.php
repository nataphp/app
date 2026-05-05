#!/usr/bin/php -q
<?php
/**
 * Command-line code generation utility to automate programmer chores.
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2012, Cake Software Foundation, Inc.
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Console
 * @since         CakePHP(tm) v 2.0
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */

 use Nata\Cron\Dispatcher;
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
         fwrite(STDERR, "Composer dependencies missing. Run `composer install` from the project root.\n");
         exit(1);
     }
     require $composerAutoload;

 /**
  * Register ClassLoader autoload
  */
     ClassLoader::register();

 /**
  * Set include path.
  */
     if (function_exists('ini_set')) {
         ini_set('include_path', ROOT . PATH_SEPARATOR . ini_get('include_path'));
     }

 /**
  * Check include path.
  */
     if (!class_exists('\Nata\Cron\Dispatcher')) {
         trigger_error('Could not locate NataPHP core files.', E_USER_ERROR);
     }

 /**
  * Extract $argv from $_GET.
  */
     if (!isset($argv) && !empty($_GET)) {
         $argv = array_keys($_GET);
         array_unshift($argv, 'path-to-file');
     }

 /**
  * Dispatch...
  */
     return Dispatcher::run($argv);
