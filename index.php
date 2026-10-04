<?php

require_once 'core/Controller.php';

// Controller default
$default_controller = 'Latihan1Controller';
$default_method = 'index';

// Ambil controller dari URL
$controller = isset($_GET['controller'])
    ? $_GET['controller']
    : $default_controller;

// Ambil method dari URL
$method = isset($_GET['method'])
    ? $_GET['method']
    : $default_method;

// File controller
$controllerFile = './controller/' . $controller . '.php';

if (file_exists($controllerFile)) {

    require_once $controllerFile;

    // Buat object controller
    $objController = new $controller();

    // Cek method
    if (method_exists($objController, $method)) {

        // Jalankan method
        $objController->$method();

    } else {
        echo "Method tidak ditemukan.";
    }

} else {
    echo "Controller tidak ditemukan.";
}