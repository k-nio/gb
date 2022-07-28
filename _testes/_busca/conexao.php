<?php

class Conection {
    private $host;
    private $user;
    private $password;
    private $db;
    public $conn;
    
    function setHost($host){
        $this->host = $host;
    }

    function setUser($user){
        $this->user = $user;
    }

    function setPassword($password){
        $this->password = $password;
    }

    function setDb($db){
        $this->db = $db;
    }
    function getHost() {
        return $this->host;
    }

    function getUser() {
        return $this->user;
    }

    function getPassword() {
        return $this->password;
    }

    function getDb() {
        return $this->db;
    }

    
        
    
    public function conex() {
        
        $conn = new Conection();
        
        $conn->setHost("localhost");
       // $con->setUser("id4668471__imba_admin");
        $conn->setUser("root");
        //$con->setPassword("Rg1271975084@");
        $conn->setPassword("");
        //$con->setDb("id4668471__imba");
        $conn->setDb("imba");
        $this->host = $conn->gethost();
        $this->user = $conn->getUser();
        $this->password = $conn->getPassword();
        $this->db = $conn->getDb();
        $this->conn = new mysqli($this->host,$this->user,$this->password,$this->db)or die($this->conn->errno);
        $this->conn->set_charset("utf8");
        return$this->conn;
    }
}
