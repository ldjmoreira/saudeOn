<?php
session_start();
$user = $_SESSION['user'];

if(isset($user)) {
    
//requireValidSession();
//array('a' => 1, 'b' => 2, 'c' => 3, 'd' => 4, 'e' => 5)
$arr = "olax";
$arr2 = array('a' => 1, 'b' => 2, 'c' => 3, 'd' => 4, 'e' => 5);
echo $arr;  //json works too

}







