<?php

// This class manages the connection to a MySQL database using PDO (PHP Data Objects).
// It provides a method connect() to establish a secure database connection and can be modified in order to switch
// to a different database engine

class Database
{
    // database configuration parameters
    private $host = 'localhost';
    private $db_name = 'webnode';
    private $username = 'root';
    private $password = '';

    // database connection instance
    private $connection;

// This function is responsible for establishing a connection to the database using the previously defined connection parameters
// It utilizes PDO for secure and flexible database interactions, it creates a PDO instance and sets an error mode attribute to throw 
// exceptions when errors occur.
    public function connect()
    {
        try {
            $this->connection = new PDO(
                "mysql:host=$this->host;dbname=$this->db_name;charset=utf8",
                $this->username,
                $this->password
            );
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo "Database connection error: " . $e->getMessage();
        }

        return $this->connection;
    }
}
