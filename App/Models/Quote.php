<?php

namespace App\Models;

use App\Config\Database;

class Quote{

	private $conn;
	private $table;
	private $db;

	public function __construct(){

        $this->db = new Database();
		$this->conn = $this->db->getConnection();
		$this->table = "quote";
	}
	public function getAll(){
		return $this->conn->query("SELECT * from $this->table");
	}
    public function getQuoteUser($quote_id){
        return $this->conn->query("SELECT user.name, user.email, user.phone from $this->table INNER JOIN user on $this->table.user_id=user.id WHERE $this->table.id = $quote_id LIMIT 1");
    }
    public function getQuoteTotalPrice($quote_id){
        return $this->conn->query("SELECT * from $this->table WHERE $this->table.id = $quote_id");
    }
    public function save($user_id, $total_price ){
        $this->conn->query("INSERT into $this->table( user_id, total_price) VALUES ('$user_id', '$total_price')");
        return $this->conn->insert_id;
    }
    public function update($total_price, $quote_id){
        $this->conn->query("UPDATE $this->table SET total_price='$total_price' WHERE id='$quote_id'");
    }
}