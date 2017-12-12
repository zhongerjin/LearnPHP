<?php
/**
 * Created by PhpStorm.
 * User: interesting
 * Date: 2017/12/7
 * Time: 9:59
 */

class User
{

    private $account;
    private $password;

    public function __construct($account, $password)
    {
        $this->account = $account;
        $this->password = $password;
    }

    public function getAccount()
    {
        return $this->account;
    }

    public function setAccount($account)
    {
        $this->account = $account;
    }

    public function getPassword()
    {
        return $this->account;
    }

    public function setPassword($password)
    {
        $this->account = $password;
    }
}