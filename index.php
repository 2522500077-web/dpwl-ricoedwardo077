<?php
require_once 'config/routes.php';

$url = $_GET['url'] ?? '';

if ($url == '') {
    $url = $route['default_controller'] . '/index';
}

$url = trim($url, '/');
$segment = explode('/', $url);

$controller = $segment[0] ?? $route['default_controller'];
$method     = $segment[1] ?? 'index';
$parameter  = $segment[2] ?? null;