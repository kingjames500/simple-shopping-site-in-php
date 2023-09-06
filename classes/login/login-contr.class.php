<?php

class loginContr  extends Login{
    private $uid;
    private $pwd;


    public function __construct($uid, $pwd){
        $this->uid = $uid;
        $this->pwd = $pwd;
       
    }
    private function emptyInput(){
        $results;
        if (empty($this->uid) || empty($this->pwd)) {
            $results = false;
        }else {
            $results = true;
        }
    
        return $results;
    }
    private function invalidEmail(){
        $result;
        if (!filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
            $result = false;
        } else {
            $result = true;
        }
        return $result;   
    }
  

    public function loginUser(){
        if ($this->emptyInput() == false) {
            header("location: ../login.php?error=emptyinputs");
            exit();
        }
        $this->userLogin($this->uid, $this->pwd);
    }
}