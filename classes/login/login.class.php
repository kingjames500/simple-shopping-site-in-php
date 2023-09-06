<?php

class Login extends dbConnect{
    protected function userLogin($email, $password){
        $stmt = $this->connect()->prepare("SELECT password FROM users WHERE email = ? OR password = ?");
        if (!$stmt->execute(array($email, $password))) {
            $stmt = null;
            echo "Error: " . $stmt->errorCode();
            header("location: ../login.php?error=stmtFailed");
            exit();
        }

        if ($stmt->rowCount() == 0) {
            $stmt = null;
            header("location: ../login.php?error=userNotFound12");
            exit();
        }
        $pwdHashed = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $checkPassword = password_verify($password, $pwdHashed[0]["password"]);

        if ($checkPassword == false) {
            $stmt = null;
            header("location: ../login.php?error=wrongPassword");
            exit();
        }
        elseif ($checkPassword == true) {
            $stmt = $this->connect()->prepare("SELECT * FROM users WHERE email = ? OR username = ? AND password = ?");
           if (!$stmt->execute(array($email, $email, $password))) {
                $stmt = null;
                echo "Error: " . $stmt->errorCode();   
                header("location: ../login.php?error=stmtFailed2");     
                exit();
            # code...
           }

            if ($stmt->rowCount() == 0) {
                $stmt = null;
                header("location: ../login.php?error=userNotFound");
                exit();
            }

            $user = $stmt->fetch(PDO::FETCH_ASSOC);
            session_start();
            $_SESSION["name"] = $user["username"];
            $_SESSION["email"] = $user["email"];
            $_SESSION["usersId"] = $user["users_id"];
            header("location: ../products.php?login=success");
        }

        $stmt = null;

    }
}