<?php

namespace App\Models;

use App\Config\Database;

class QuoteProduct{

	private $conn;
	private $table;
	private $db;

	public function __construct(){

        $this->db = new Database();
		$this->conn = $this->db->getConnection();
		$this->table = "quote_product";
	}
	public function getAll(){
		return $this->conn->query("SELECT * from $this->table");
	}
	public function getAllProductsOfQuote($quote_id){
		return $this->conn->query("SELECT * from $this->table INNER JOIN product on $this->table.product_id=product.id WHERE $this->table.quote_id = $quote_id");
    }

    public function savePerDay($quote_id, $product_id, $start_date, $end_date, $total ){
        $this->conn->query("INSERT into $this->table( quote_id, product_id, start_date, end_date, total) 
                                  VALUES ('$quote_id', '$product_id', '$start_date', '$end_date', '$total')");
        return $this->conn->insert_id;
    }

    public function savePerHour($quote_id, $product_id, $hours, $total ){
        $this->conn->query("INSERT into $this->table( quote_id, product_id, hours, total) 
                                  VALUES ('$quote_id', '$product_id', '$hours', '$total')");
        return $this->conn->insert_id;
    }

    public function savePerQuantity($quote_id, $product_id, $quantity, $total ){
        $this->conn->query("INSERT into $this->table( quote_id, product_id, quantity, total) 
                                  VALUES ('$quote_id', '$product_id', '$quantity', '$total')");
        return $this->conn->insert_id;
    }
}