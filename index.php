<?php

require 'vendor/autoload.php';

use App\Controllers\BookController;
use App\Models\Book;
use App\Models\Database;

error_reporting(E_ALL);
ini_set('display_errors', 'On');

define('ROOT', str_replace('index.php', '', $_SERVER['SCRIPT_FILENAME']));
session_start();

require 'src/views/partials/header.php';

if (isset($_GET['action']) && !empty($_GET['action'])) {
    $params = explode('/', $_GET['action']);

    if ($params[0] == '') {
        $controller = $params[0];
        $action = $params[1] ?? 'library';
        $controllerFile = ROOT . 'controllers/' . $controller . 'Controller.php';

        if (file_exists($controllerFile)) {
            require_once $controllerFile;

            if (function_exists($action)) {
                if (isset($params[2]) && isset($params[3])) {
                    $action($params[2], $params[3]);
                } else if (isset($params[2])) {
                    $action($params[2]);
                } else {
                    $action();
                }
            } else {
                header('HTTP/1.0 404 Not Found');
                require_once 'views/errors/404.html';
            }
        } else {
            header('HTTP/1.0 404 Not Found');
            require_once 'views/errors/404.html';
        }
    }
} else {
    require_once 'src/controllers/BookController.php';
    $books = new BookController();
    $books->index();
}

require 'src/views/partials/footer.php';