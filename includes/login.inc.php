<?php

if (isset($_POST["submit"])) {
    $uid = $_POST["email"];
    $pwd = $_POST["password"];

    //instantiating the class
    include  "../classes/dhb.class.php";
    include  "../classes/login/login.class.php";
    include  "../classes/login/login-contr.class.php";

    $login = new loginContr($uid, $pwd);
    $login->loginUser();

    if ($login == true) {
        header("loctaion: ./products.php");
    }
}