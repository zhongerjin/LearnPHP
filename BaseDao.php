<?php
/**
 * Created by PhpStorm.
 * User: interesting
 * Date: 2017/12/5
 * Time: 15:08
 */
class BaseDao{
    protected $link;
    private $server = 'localhost', $username = 'root', $password = '123456', $db = 'nicezandb', $dsn, $dbms = 'mysql';

    public function __construct()
    {
        $this->dsn = "$this->dbms:host=$this->server;dbname=$this->db";
        $this->connect();
    }
    public function connect(){
        $this->link = new PDO($this->dsn, $this->username, $this->password);
    }
}