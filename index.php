<?php
// public/index.php
require_once __DIR__ . '/app/controllers/UserController.php';
require_once __DIR__ . '/app/models/UserModel.php';
require_once __DIR__ . '/config/config.php';
require_once __DIR__ . '/lib/DB/MysqliDb.php';

use C\UserController;

use M\UserModel;

$request =  $_SERVER['REQUEST_URI'];
define('BASE_PATH', '/darrebni/mvc/');

// $action = isset($_GET['action']) ? $_GET['action'] : 'index';

$config = require 'config/config.php';
$db = new MysqliDb(
    $config['db_host'],
    $config['db_user'],
    $config['db_pass'],
    $config['db_name']
);

$model = new UserModel($db);
$controller = new UserController($model);

switch ($request) {
    case BASE_PATH:
        $controller->index();
        break;
    case BASE_PATH . 'add':
        $controller->addUser();
        break;
    case BASE_PATH . 'show?userID=' . $_GET["userID"]:
        $controller->getUserByID();
        break;
    case BASE_PATH . 'update?userID=' . $_GET["userID"]:
        $controller->editUser($_GET["userID"]);
        break;
    case BASE_PATH . 'delete?userID=' . $_GET["userID"]:
        $controller->deleteUser();
        break;
}
// if ($request) {
//     $controller->index();
// } elseif(BASE_PATH .'add'){
//     $controller->addUser();
// }elseif(BASE_PATH .'edit'){
//     $controller->editUser();
// }
// if (method_exists($controller, $action)) {
//     $controller->$action();
// } else {
//     echo "Action not found!";
// }
