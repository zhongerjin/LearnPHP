<?php
/**
 * Created by PhpStorm.
 * User: interesting
 * Date: 2017/12/5
 * Time: 15:10
 */

require_once 'BaseDao.php';
require_once 'User.php';
require_once 'Page.php';
class UserDao extends BaseDao
{
    public function save($account, $password)
    {
        $sql = "insert into user (id, account, password) VALUES (:id, :account, :password)";
        $sth = $this->link->prepare($sql);
        $id = md5(uniqid(mt_rand(), true));
        $sth->bindValue(':id', $id);
        $sth->bindValue(':account',$account);
        $sth->bindValue(':password', md5($password));
        $sth->execute();
    }

    public function FindAll()
    {
        $sql = "select * from user";
        $sth = $this->link->prepare($sql);
        $sth->execute();
        $array = [];
        while ($row = $sth->fetch(PDO::FETCH_ASSOC)){
            $user = new User($row['account'], $row['password']);
            $array[] = $user;
        }
        $page = new Page(0, $array);
    }
}