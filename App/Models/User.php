<?php

namespace App\Models;

use App\Config\Database;

class User
{

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
        $this->table = "user";
    }

    /**
     * Get all of the models from the database.
     *
     */
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
