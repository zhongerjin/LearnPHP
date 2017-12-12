<?php
/**
 * Created by PhpStorm.
 * User: interesting
 * Date: 2017/12/4
 * Time: 10:54
 */

namespace MyProject\bar;

require_once 'namespaces.php';

const FOO = 2;
function foo()
{
//    $sbdl = $_GET['controller'];
    $sbdl = $_POST['controller'];
    if(!isset($_SESSION)){
        session_start();
    }
    echo __NAMESPACE__;
}
class namespaces1
{
    static function staticmethod() {}
}
//非限定名称
foo();
namespaces1::staticmethod();
//限定名称
sb\foo();
sb\namespaces::staticmethod();
//完全限定名称
\MyProject\bar\foo();
\MyProject\bar\namespaces1::staticmethod();