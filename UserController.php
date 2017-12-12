<?php
/**
 * Created by PhpStorm.
 * User: interesting
 * Date: 2017/12/5
 * Time: 14:15
 */

//namespace User;
require_once 'UserDao.php';

class UserController
{
    public $asd;
    public function register()
    {
        $account = $_POST['account'];
        $password = $_POST['password'];
        unset($_POST['account']);
        unset($_POST['password']);
        $userdao = new UserDao();
        $userdao->save($account, $password);
    }

    public function findUser()
    {
        $userdao = new UserDao();
        $userdao->FindAll();
    }
}