<?php
class dbConnect
{
    protected function connect(){
        //error handling method
        try {
            $username = "root";
            $password = "1234";
            $db = new PDO('mysql:host=localhost;dbname=shoppingcart', $username, $password);
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);   
            return $db;                     
        } catch (PDOException $error) {
            echo "Connection failed: " . $error->getMessage();
            exit();             
            
        }
    }
}