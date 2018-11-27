<?php
namespace App\Config;

class Database{
	private $server = "HOST";
	private $username = "USERNAME";
	private $pass = "USER_PASSWORD";
	private $db = "DB_NAME";
	private $conn = null;

	public function __construct(){
		try{
            $this->conn = new \mysqli($this->server, $this->username, $this->pass, $this->db);
        }
		catch (\Exception $err) {
            die($err->getMessage());
        }

	}

	public function getConnection(){
		return $this->conn;
	}
}