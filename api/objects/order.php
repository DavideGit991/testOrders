<?php
class Order{
  
    // database connection and table name
    private $conn;
    private $table_name = "orders";
  
    // object properties
    public $id;
    public $name;
    public $lastname;
    public $date_order;
  
    // constructor with $db as database connection
    public function __construct($db){
        $this->conn = $db;
    }
    // read products
    function getOrdersAsc(){
    // select all query
    $query = "SELECT*\n"

    . "from orders \n"

    . "ORDER by date_order ASC";
  
    // prepare query statement
    $stmt = $this->conn->prepare($query);
  
    // execute query
    $stmt->execute();
  
    return $stmt;
    }
    function getOrdersDesc(){
        // select all query
        $query = "SELECT*\n"
    
        . "from orders \n"
    
        . "ORDER by date_order DESC";
      
        // prepare query statement
        $stmt = $this->conn->prepare($query);
      
        // execute query
        $stmt->execute();
      
        return $stmt;
    }

}
?>