<?php

include __DIR__ . '/config.php';
class Product{

    private $dbh;
    public  function __construct(){
        $this->dbh = new databaseConnect;
    }
    private function messages($statusCode, $message){
        $feedback = array(
            'code' => $statusCode,
            'message' => $message
        );
        header('HTTPS/1.1 ' .$statusCode. ' ' .$message);
        return json_encode($feedback);
    }

    function createProduct( array $data){
        $stmt = $this->dbh->prepare("INSERT INTO products (prodName, prodDesc, prodPrice, prodQty) VALUES (:prodName, :prodDesc, :prodPrice,:prodQtt)");
        $stmt->bindParam(':prodName', $data['prodName']);
        $stmt->bindParam(':prodDesc', $data['prodDesc']);
        $stmt->bindParam(':prodPrice', $data['prodPrice']);
        $stmt->bindParam(':prodQtt', $data['prodQtt']);

        if (empty($data['prodName']) || empty($data['prodDesc']) || empty($data['prodPrice']) || empty($data['prodQtt'])) {
            return $this->messages(422, 'unprocessable entity/ field is empty');
        }
        else {
            if (!$stmt->execute()) {
                return $this->messages(500, 'Internal server error');
            }
            else {
                return $this->messages(200, 'Product created');
            }
        }
    }

}