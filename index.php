<?php
/**
 * Created by PhpStorm.
 * User: interesting
 * Date: 2017/12/5
 * Time: 14:18
 */

//namespace Index;
header('Content-Type:text/json;charset=utf-8');
require_once 'IndexController.php';
require_once 'UserController.php';
$controller = isset($_POST['controller'])? $_POST['controller']: 'IndexController';
$method = isset($_POST['method'])? $_POST['method']: 'index';
unset($_POST['controller']);
unset($_POST['method']);
$c = new $controller;
$c->$method();