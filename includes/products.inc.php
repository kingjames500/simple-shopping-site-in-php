<?php

header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST, GET, DELETE, PUT');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With');

// including classes files and database connection
include "../classes/product/product.class.php";
//declaring servermethod
$serverMethod = $_SERVER['REQUEST_METHOD'];

//instantiating class product
$req = new Product;

//checking if server method is valid
function isServerMethodValid($serverMethod){
    $feedback = array(
        'code' => 405,
        'message' =>  $serverMethod. 'Method not allowed'
    );
    header('HTTPS/1.1 405 Method not allowed');
    return json_encode($feedback);
}

//using swith statement to insert data into database and to check if the server method is valid

switch ($serverMethod) {
    case 'POST':
        if ($serverMethod == 'POST') {
            $data = json_decode(file_get_contents("php://input"));
            echo $req->createProduct($data);
        }
        else {
            return isServerMethodValid($serverMethod);
        }    
        break;
    
    default:
        # code...
        break;
}