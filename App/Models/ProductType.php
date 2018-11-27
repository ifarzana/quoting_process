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

        /**
         * The database table used by the model.
         *
         * @var string
         */
		$this->table = "product_type";
	}

    /**
     * Get all of the models from the database.
     *
     */
    public function getAll(){
		return $this->conn->query("SELECT * from $this->table");
	}
    public function getPriceType($product_type_id){
        return $this->conn->query("SELECT price_type from $this->table where $this->table.id='$product_type_id'");
    }

}