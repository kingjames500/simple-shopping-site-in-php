<?php

 class databaseConnect extends PDO
 {
     public function __construct()
     {
         $username = "root";
         $password = "1234";
         parent::__construct("mysql:host=localhost;dbname=shoppingcart", $username, $password,
             array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
         $this->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
         $this->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
         $this->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
     }
 }