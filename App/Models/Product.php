<?php

namespace App\Models;

use App\Config\Database;

class Product{

	private $conn;
	private $table;
	private $db;

	public function __construct(){

        $this->db = new Database();
		$this->conn = $this->db->getConnection();
		$this->table = "product";
	}
	public function getAll(){
		return $this->conn->query("SELECT * from $this->table");
	}
    public function getAllProductByProductTypeID($product_type_id){
        return $this->conn->query("SELECT id, name from $this->table where $this->table.type_id='$product_type_id'");
    }
    public function getPrice($product_id){
        return $this->conn->query("SELECT price from $this->table where $this->table.id='$product_id'");
    }
}