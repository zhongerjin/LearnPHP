<?php
/**
 * Created by PhpStorm.
 * User: interesting
 * Date: 2017/11/23
 * Time: 10:44
 */
//接口可以定义常量，但是不能被子类或子接口覆盖
//接口中定义的所有方法都必须是公有，这是接口的特性。
//接口起到约束作用,继承了这个接口就一定要按照规范声明方法
interface Itemplate{
    const lala = 'sbsbsbsdl';
    public function setValue($value);
    public function setName($name);
}