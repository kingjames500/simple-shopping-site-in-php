<?php

if (isset($_POST["submit"])) {
    $uid = $_POST["username"];
    $email = $_POST["email"];
    $pwd = $_POST["password"];
    $pwdRepeat = $_POST["passwordRepeat"];

    //instantiating the class

    include __DIR__ . "../classes/dhb.class.php";
    include __DIR__ . "../classes/signup/signup.class.php";
    include __DIR__ . "../classes/signup/signup-contr.class.php";

    $signup = new signupContr($uid, $pwd, $pwdRepeat, $email);
    $signup->newUser();
}