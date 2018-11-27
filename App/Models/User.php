<?php

namespace App\Models;

use App\Config\Database;

/**
 * Example user model
 *
 * PHP version 7.0
 */
class User
{

    private $conn;
    private $table;
    private $db;

    public function __construct(){

        $this->db = new Database();
        $this->conn = $this->db->getConnection();
        $this->table = "user";
    }
    public function getAll(){
        return $this->conn->query("SELECT * from $this->table");
    }
    public function getUser($user_id){
        return $this->conn->query("SELECT * from $this->table WHERE $this->table.id = $user_id");
    }

    public function save($name, $password, $email, $phone ){
        $this->conn->query("INSERT into $this->table( name, password, email, phone) VALUES ('$name', '$password', '$email', '$phone')");
        return $this->conn->insert_id;
    }
}
