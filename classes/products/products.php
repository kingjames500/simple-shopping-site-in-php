<?php
class Products extends dbConnect{
    protected function createProducts($name, $price, $imageName, $quantity){
        $stmt = $this->connect()->prepare("INSERT INTO products (name, price, imageName, quantity) VALUES (:name, :price, :imageName, :quantity)");
        $stmt->bindParam(":name", $name, PDO::PARAM_STR);
        $stmt->bindParam(":price", $price, PDO::PARAM_INT);
        $stmt->bindParam(":imageName", $imageName, PDO::PARAM_STR);
        $stmt->bindParam(":quantity", $quantity, PDO::PARAM_INT);
        if(!$stmt->execute()){
            $stmt = null;
            header("Location: ../index.php?error=stmtfailed");
            exit();
        }
        $stmt = null;
    }
    protected function checkIfExists($name, $imageName){
        $stmt = $this->connect()->prepare("SELECT name, imageName FROM products WHERE name = :name OR imageName = :imageName"); 
        $stmt->bindParam(":name", $name, PDO::PARAM_STR);
        $stmt->bindParam(":imageName", $imageName, PDO::PARAM_STR);
        if(!$stmt->execute()){
            $stmt = null;
            header("Location: ../index.php?error=stmtfailed");
            exit();
        }
        $result;
        if($stmt->rowCount() > 0){
            $result = false;
        }
        else{
            $result = true;
        }
        return $result;
    }

    protected function deleteItem($id){
        $stmt = $this->connect()->prepare("DELETE FROM products WHERE id = :id");
        $stmt->bindParam(":id", $id, PDO::PARAM_INT);
        if(!$stmt->execute()){
            $stmt = null;
            header("Location: ../index.php?error=stmtfailed");
            exit();
        }
        $result;
        if ($stmt->rowCount() == 0) {
            $result = false;
        }
        else {
            $result = true;
        }
        $stmt = null;
    }
    protected function getAllProducts(){
        $stmt = $this->connect()->prepare("SELECT * FROM products");
        if (!$stmt->execute()) {
            echo '<script>alert("Internal Server Error");</script>';
            
        }
    }
}