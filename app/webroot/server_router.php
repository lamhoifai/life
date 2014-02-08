<?php
$ds = DIRECTORY_SEPARATOR;
$app = dirname(dirname(__FILE__));
$www_root = $app . $ds . 'webroot';

$url = parse_url($_SERVER['REQUEST_URI']);
$resource = $www_root . $ds . $url['path'];

if (file_exists($resource)) {
    return false; // serve the requested resource as-is.
} else {
    $_SERVER['PHP_SELF'] = 'index.php';
    require $www_root . $ds . 'index.php';
}