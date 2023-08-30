<?php

if (isset($_POST["submit"])) {
    $uid = $_POST["email"];
    $pwd = $_POST["password"];

    //instantiating the class
    include __DIR__ . "../classes/dhb.class.php";
    include __DIR__ . "../classes/login/login.class.php";
    include __DIR__ . "../classes/login/login-contr.class.php";

    $login = new loginContr($uid, $pwd);
    $login->loginUser();

}