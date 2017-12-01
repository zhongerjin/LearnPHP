<?php
include_once 'interface.php';
class Point2D {
    const sbdl = "sbdl";
    public $x, $y, $label;

    //此方法被废弃
    // function Point2D($x, $y){
    //     $this->x = $x;
    //     $this->y = $y;
    // }

    function  __construct($x, $y)
    {
        $this->x = $x;
        $this->y = $y;
    }

    function setLabel($label)
    {
        $this->label = $label;
    }

    function getPoint()
    {
        // return array("x" => $this->x,
        //              "y" => $this->y,
        //              "label" => $this->label);
        return ["x"=> $this->x,"y"=> $this-> y, "label"=> $this->label];
    }
    //析构函数
    //被销毁时会执行
    function __destruct()
    {
        echo "</br>"."i am die";
    }
}
$p1 = new Point2D("123","456");
print_r(get_object_vars($p1));
echo $p1->x;
$p1->setLabel("789");
print_r(get_object_vars($p1));
//获取常量
var_dump($p1::sbdl);

class Point3D extends Point2D {
    public static $my_static = "ssbbddll";

    //子类继承父类，如子类未定义构造函数会隐式调用父类的构造函数。
    //要执行父类的构造函数，需在子类定义构造函数才能调用parent::__construct()
    //如果子类未定义构造函数则会如同一个普通函数从父类继承(假如父类的构造函数没有定义private)
    function __construct($x, $y)
    {
        $this->x = $x;
        $this->y = $y;
        echo "<b>".$x.$y."</b>";
    }

    function getConst(){
        echo parent::sbdl;
        echo self::$my_static;
    }
    public static function getStatic(){
        echo "hahahah";
    }
}
$p2 = new Point3D(1,2);
print_r($p2::sbdl);
echo "</br>".$p2::$my_static."</br>";
echo $p2::getStatic()."</br>";
$d3 = 'Point3D';
echo $d3::$my_static ."</br>";
echo $d3::getStatic();

class foo{
    private $a;
    public $b = 1;
    public $c;
    private $d;
    static $e = 1;
    public function test(){
        var_dump(get_object_vars($this));
    }
}
$test = new foo;
echo "</br>";
var_dump(get_object_vars($test));
$test->test();

class Bar{
    public $public = 'PUBLIC';
    //私有的，只有内部类才可以访问
    private $private = 'PRIVATE';
    //受保护的，子类和父类以及内部类可以访问
    protected $protected = 'PROTECTED';

    public function printBar(){
        echo $this-> public;
        echo "</br>";
        echo $this-> private;
        echo "</br>";
        echo $this-> protected;
    }

    public function test() {
        $this->testPrivate();
        $this->testPublic();
    }

    public function testPublic() {
        echo "Bar::testPublic1\n";
    }

    private function testPrivate() {
        echo "Bar::testPrivate1\n";
    }
}

class Sss extends Bar{
    // 可以对 public 和 protected 进行重定义，但 private 而不能
    protected $protected = 'Protected2';

    public function testPublic() {
        echo "Sss::testPublic2\n";
    }

    private function testPrivate() {
        echo "Sss::testPrivate2\n";
    }
}
$mySss = new Sss();
$mySss->test();
//这里获取属性的时候不用$
echo $mySss-> public;
//获取不到
// $mySss-> private;
// echo $mySss-> protected;
echo "</br>";
$mySss-> printBar();

class Test{
    private $foo;

    public function __construct($foo){
        $this-> $foo = $foo;
    }
    public function bar(){
        echo "Access the private method";
    }
    public function baz(Test $other){
        $other-> foo = "Hello";
        var_dump($other-> foo);
        $other-> bar();
    }
}
echo "</br>";
$tt = new Test('test');
$tt->baz(new Test('other'));
interface I {
    public function f();
}
class C implements I {
    public function f(){}
}
class E{}
function f(I $i){
    get_class($i)."\n";
}
f(new C);
//f(new E);

//继承接口
class Template implements Itemplate{
    private $value, $name;

    public function setValue($value)
    {
        return $this->value = $value;
    }
    public function setName($name)
    {
        return $this->name = $name;
    }
    public function forea($arrs){
//        foreach ($arrs as $key => $value){
//            $arrs[$key] = $value + 1;
//        }
        foreach ($arrs as &$value){
            $value = $value + 1;
        }
        //foreach完之后,$value引用仍会在foreach中保留,需要销毁
        unset($value);
        return $arrs;
    }
}
$templates = new Template;
echo "</br>";
echo $templates->setName('dl');
echo $templates->setValue(18);
echo $templates::lala ."</br>";
print_r($templates->forea([1123,2,3]));
$vowels = array("a", "e", "i", "o", "u", "A", "E", "I", "O", "U");
var_dump(str_replace($vowels, "", "Hello World of PHP"));

//匿名类
var_dump(new class(123){
    function __construct($num)
    {
        echo $num;
    }
});

class Outer
{
    private $value = 1;
    public function fun1()
    {
        return 3;
    }
    public function create_class()
    {
        return new class($this->value) extends Outer{
            private $value2 = 2;
            public function __construct($value)
            {
                $this->value2 = $value;
            }
            public function fun2()
            {
                return $this->fun1() + $this->value2;
            }
        };
    }
}
echo (new Outer)-> create_class()-> fun2();

class Method
{
    const ssbbddll = 123;
    public static function __callStatic($name, $arguments)
    {
        echo "Calling static method '$name' ". implode('. ', $arguments);
    }
    public static function sbdl($name, $arguments)
    {
        echo "a stasdasdasatic masdasdasdasdethod";
    }
}
Method::runTest('in static context');
Method::runTTTT('hah');
Method::sbdl(123,123);
echo Method::ssbbddll;

class Myclass{
    public $var1 = 'var1';
    public $var2 = 'var2';
    protected $protectes = 'protectes';
    private $privates = 'privates';

    public function printVisible(){
        echo "i printVisible!!!!!";
        foreach($this as $key => $value){
            print "$key : $value\n";
        }
    }
}
$myclass = new Myclass();
echo "</br>";
foreach ($myclass as $key => $value){
    print_r($key .":". $value);
}
echo "</br>";
$myclass->printVisible();

class MyIterator implements Iterator
{
    private $var = array();

    public function __construct($array)
    {
        if (is_array($array)) {
            $this->var = $array;
        }
    }

    public function rewind() {
        echo "rewinding\n";
        reset($this->var);
    }

    public function current() {
        $var = current($this->var);
        echo "current: $var\n";
        return $var;
    }

    public function key() {
        $var = key($this->var);
        echo "key: $var\n";
        return $var;
    }

    public function next() {
        $var = next($this->var);
        echo "next: $var\n";
        return $var;
    }

    public function valid() {
        $var = $this->current() !== false;
        echo "valid: {$var}\n";
        return $var;
    }
}
echo "</br>";
$values = array(1,2,3);
$it = new MyIterator($values);

foreach ($it as $a => $b) {
    print "$a: $b\n";
}

class Mycollection implements IteratorAggregate{
    private $item = [];
    private $count = 0;
    public function getIterator()
    {
        return new MyIterator($this->item);
    }
    public function add($value){
        $this->item[$this->count++] = $value;
    }
}
echo "</br>";
$coll = new Mycollection();
$coll->add('value1');
$coll->add('value2');
$coll->add('value3');
foreach ($coll as $key => $value){
    echo "key/value: [$key -> $value]\n";
}
class Connection{
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
class Find extends Connection {
    public function FindAll()
    {
        $sql = "select * from nice_content";
        $sth = $this->link->prepare($sql);
        $sth->execute();
//        while ($row = $sth->fetch(PDO::FETCH_ASSOC)){
//            var_dump($row);
//        }
        $row = $sth->fetchAll(PDO::FETCH_ASSOC);
        var_dump($row);
    }

    public function FindById($value)
    {
        $sql = "select * from test where ID = :value";
        $sth = $this->link->prepare($sql);
        $sth->bindParam(':value', $value);
//        $sth->bindValue(':key',"<script>alert('asd')</script>");
//        $sth->bindValue(':value', "<script>console.log('123')</script>");
//        $sth->bindValue(':key', $aaa);
//        $sth->bindValue(':value', $bbb);
        $sth->execute();
        $row = $sth->fetchAll(PDO::FETCH_ASSOC);
        var_dump($row);
    }

    public function UpdateById($key, $value)
    {
        $sql = "update test set po = :value where ID = :key";
        $sth = $this->link->prepare($sql);
        $sth->bindParam(':key', $key);
        $sth->bindParam(':value', $value);
        $sth->execute();
    }

    public function Insert($key, $value)
    {
        $sql = "insert into test values (:key, :value)";
        $sth = $this->link->prepare($sql);
        $sth->bindValue(':key',$key);
        $sth->bindValue(':value', $value);
        $sth->execute();
    }

    public function DeleteById($key)
    {
        $sql = "delete from test where ID = :key";
        $sth = $this->link->prepare($sql);
        $sth->bindValue(':key', $key);
        $sth->execute();
    }
}
$sss = new Connection('mysql', 'localhost', 'root','123456', 'nicezandb');
//$sth = $sss->connect();rrrr
//$sql = "select * from nice_content";
////$aaa = ";delete from nice_content where tit = '海贼王'";
//$aaa = "海贼王";
//$sqls = "select * from nice_content where tit =:value";
//$sms = $sth->prepare($sqls);
//$sms->bindValue(':value', $aaa);
//$sms->execute();
$fff = new Find();
//$fff->FindAll();
$fff->FindById('34');
$fff->UpdateById('3','24232323');
$fff->Insert('21123',"1");
$fff->DeleteById('2');
//foreach ($sth->query($sqls) as $item => $value){
//    var_dump($item);
//    echo "</br>";
//    echo "asd";
//    var_dump($value);
//}
exit();
?>