<?php
/**#@+
 * @see http://forums.zend.com/viewtopic.php?f=8&t=107368
 */
defined('CURLOPT_PROTOCOLS') || define('CURLOPT_PROTOCOLS', 101);
defined('CURLPROTO_HTTP')    || define('CURLPROTO_HTTP', 1);
defined('CURLPROTO_HTTPS')   || define('CURLPROTO_HTTPS', 2);
/**#@-*/


chdir(dirname(__DIR__));

// Setup autoloading
require 'init_autoloader.php';

// Run the application!
Zend\Mvc\Application::init(require 'config/application.config.php')->run();
