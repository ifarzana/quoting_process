<?php

namespace App\Models;

use App\Config\Database;

class QuoteProductService{

	private $conn;
	private $table;
	private $db;

	public function __construct(){

        $this->db = new Database();
		$this->conn = $this->db->getConnection();
		$this->table = "quote_product_service";
	}
	public function getAll(){
		return $this->conn->query("SELECT * from $this->table");
	}

    public function save($quote_product_id, $day_of_the_week, $from_time, $to_time, $num_of_weeks, $recurring ){
        $this->conn->query("INSERT into $this->table( quote_product_id, day_of_the_week, from_time, to_time, num_of_weeks, recurring) 
                                  VALUES ('$quote_product_id', '$day_of_the_week', '$from_time', '$to_time', '$num_of_weeks', '$recurring')");
        return $this->conn->insert_id;
    }
}