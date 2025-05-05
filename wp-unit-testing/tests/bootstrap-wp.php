<?php

define('WP_ALLOW_REPAIR', true);

$_tests_dir = __DIR__ . '/wordpress-tests-lib';

$_phpunit_polyfills_path = getenv('WP_TESTS_PHPUNIT_POLYFILLS_PATH');
if (false !== $_phpunit_polyfills_path) {
    define('WP_TESTS_PHPUNIT_POLYFILLS_PATH', $_phpunit_polyfills_path);
}

if (!file_exists("{$_tests_dir}/includes/functions.php")) {
    echo "Could not find {$_tests_dir}/includes/functions.php, have you run bin/install-wp-tests.sh ?" . PHP_EOL; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
    exit(1);
}

spl_autoload_register(function ($class_name) {
    $class_name = str_replace('\\', DIRECTORY_SEPARATOR, $class_name);
    $class_path = __DIR__ . DIRECTORY_SEPARATOR . $class_name . '.php';
    if (file_exists($class_path)) {
        include $class_path;
    }
});

require_once __DIR__ . '/../vendor/autoload.php';

// Give access to tests_add_filter() function.
require_once "{$_tests_dir}/includes/functions.php";

tests_add_filter('muplugins_loaded', function() {
    require_once __DIR__ . '/load-wp-plugins.php';
});

// Start up the WP testing environment.
require_once __DIR__ . '/../vendor/autoload.php';

if (!empty(getenv('WP_CLI_TESTS_VENDOR'))) {
    define('WP_CLI_ROOT', getenv('WP_CLI_TESTS_VENDOR'));

    require WP_CLI_ROOT . '/autoload.php';
    require WP_CLI_ROOT . '/wp-cli/wp-cli/php/utils.php';
    require WP_CLI_ROOT . '/wp-cli/wp-cli/php/dispatcher.php';
    require WP_CLI_ROOT . '/wp-cli/wp-cli/php/class-wp-cli.php';
    require WP_CLI_ROOT . '/wp-cli/wp-cli/php/class-wp-cli-command.php';
}


require "{$_tests_dir}/includes/bootstrap.php";