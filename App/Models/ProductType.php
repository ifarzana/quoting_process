<?php

namespace App\Models;

use App\Config\Database;

class ProductType{

	private $conn;
	private $table;
	private $db;

	public function __construct(){

        $this->db = new Database();
		$this->conn = $this->db->getConnection();
		$this->table = "product_type";
	}
	public function getAll(){
		return $this->conn->query("SELECT * from $this->table");
	}
    public function getPriceType($product_type_id){
        return $this->conn->query("SELECT price_type from $this->table where $this->table.id='$product_type_id'");
    }

}