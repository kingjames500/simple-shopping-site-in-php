<?php

if (isset($_POST["submit"])) {
    $uid = $_POST["username"];
    $email = $_POST["email"];
    $pwd = $_POST["password"];
    $pwdRepeat = $_POST["passwordRepeat"];

    //instantiating the class

    include  "../classes/dhb.class.php";
    include  "../classes/signup/signup.class.php";
    include "../classes/signup/signup-contr.class.php";

    $signup = new signupContr($uid, $pwd, $pwdRepeat, $email);
    $signup->newUser();

    if ($signup == true) {
        header(
            "location: ./login.php?msg=userRegisteredSuccessful"
        );
    }
    else {
        echo "an error occurred while trying to register";
    }
}