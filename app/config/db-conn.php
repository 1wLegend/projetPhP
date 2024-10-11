<?php

class DbConn {
    private $conn;
    private $hostname;
    private $username;
    private $password;
    private $database;

    public function __construct($hostname, $username, $password, $database) {
        $this->hostname = $hostname;
        $this->username = $username;
        $this->password = $password;
        $this->database = $database;
    }

    public function connect() {
        $this->conn = mysqli_connect($this->hostname, $this->username, $this->password, $this->database);
        if (!$this->conn) {
            throw new Exception("Erreur de connexion : " . mysqli_connect_error());
        }
        return $this->conn;
    }

    public function disconnect() {
        if ($this->conn) {
            mysqli_close($this->conn);
        }
    }

    public function query($sql) {
        if ($this->conn === null) {
            throw new Exception("Pas de connexion active à la base de données.");
        }

        $result = mysqli_query($this->conn, $sql);
        if (!$result) {
            throw new Exception("Erreur lors de l'exécution de la requête : " . mysqli_error($this->conn));
        }

        return $result;
    }

    public function fetchAll($sql) {
        $result = $this->query($sql);
        $data = [];
        if ($result) {
            while ($row = mysqli_fetch_assoc($result)) {
                $data[] = $row;
            }
        }
        return $data;
    }

    public function insert($sql) {
        $result = $this->query($sql);
        if ($result) {
            return mysqli_insert_id($this->conn);
        }
        return false;
    }
}
