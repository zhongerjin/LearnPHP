<?php
    //想要函数的一个参数总是通过引用传递，可以在函数定义中该参数的前面加上符号 &：
    function add_some_extra(&$string)
    {
        $string .= 'and something extra.';
    }
    $str = 'This is a string, ';
    add_some_extra($str);
    echo $str;
    echo "</br>";
    //在函数中使用默认参数
    function makecoffee($type = "cappuccino")
    {
        return "Making a cup of $type.\n";
    }
    echo makecoffee();
    echo makecoffee(null);
    echo makecoffee("espresso");
    echo "</br>";
    //任何默认参数必须放在任何非默认参数的右侧  
    function makeyogurt($flavour, $type = "acidophilus")
    {
        return "Making a bowl of $type $flavour.\n";
    }
    echo makeyogurt("raspberry"); 
    echo "</br>";
    
    function sum(...$number){
        $acc = 0;
        foreach($number as $n){
            $acc += $n;
        }
        return $acc;
    }
    $arr = [1,2,3,4];
    echo sum(1,2,3,4);
    
    function add($a, $b){
        return $a + $b;
    }
    echo add(...[1,2])."\n";

    $a = [1,2];
    echo add(...$a);
    echo "</br>";
    $aaa = new DateInterval('P1D');
    var_dump($aaa);

    $colors = ['red', 'blue', 'yellow'];
    foreach($colors as $key => $color){
        $colors[$key] = strtoupper($color);
    }
    print_r($colors);
?>