<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
  
// database connection will be here
// include database and object files
include_once '../config/database.php';
include_once '../objects/order.php';
  
// instantiate database and orders object
$database = new Database();
$db = $database->getConnection();
  
// initialize object
$order = new Order($db);
  
// read products will be here
// query products
$stmt = $order->getOrdersAsc();
$num = $stmt->rowCount();
  
// check if more than 0 record found
if($num>0){
  
    // orders array
    $orders_arr=array();
    $orders_arr["data"]=array();
  
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        
        extract($row);
  
        $order_item=array(
            "id" => $id,
            "name" => $name,
            "lastname" => $lastname,
            "date_order" => $date_order
        );
  
        array_push($orders_arr["data"], $order_item);
    }
  
    // set response code - 200 OK
    http_response_code(200);
  
    // show products data in json format
    echo json_encode($orders_arr);
}
// no orders found will be hereelse
else{
    // set response code - 404 Not found
    http_response_code(404);
    
    // tell the user no products found
    echo json_encode(
        array("message" => "No products found.")
    );    
}
  
