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

        /**
         * The database table used by the model.
         *
         * @var string
         */
		$this->table = "product";
	}

    /**
     * Get all of the models from the database.
     *
     */
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