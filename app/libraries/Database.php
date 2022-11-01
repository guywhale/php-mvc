<?php

/**
 * PDO Database Class
 * Connect to database
 * Create prepared statements
 * Bind values
 * Return rows and results
 */
class Database
{
    private $host = DB_HOST;
    private $user = DB_USER;
    private $pass = DB_PASS;
    private $dbname = DB_NAME;

    // Database handle (DBH)
    private $dbh;
    private $stmt;
    private $error;

    public function __construct()
    {
        // Set Data Source Name (DSN)
        $dsn = "mysql:host={$this->host};dbname={$this->dbname}";

        /**
         * Options explained
         *
         * ATTR_PERSISTENT => true
         * Persistent connections are not closed at the end of the script, but are cached and re-used
         * when another script requests a connection using the same credentials. The persistent
         * connection cache allows you to avoid the overhead of establishing a new connection every
         * time a script needs to talk to a database, resulting in a faster web application.
         *
         * PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
         * PDO will throw an Exception instead of a warning when there it encounters an error.
         * Can be used with try/catch for better debugging.
         */
        $options = [
            PDO::ATTR_PERSISTENT => true,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        ];

        // Create PDO instance, throw a PDO exception if database connection fails.
        try {
            $this->dbh = new PDO($dsn, $this->user, $this->pass, $options);
        } catch (\PDOException $e) {
            $this->error = $e->getMessage();
            echo $this->error;
        }
    }

    // Prepare statement with query
    // https://www.php.net/manual/en/pdo.prepare.php
    public function query($sql)
    {
        $this->stmt = $this->dbh->prepare($sql);
    }

    // Bind values
    // https://www.php.net/manual/en/pdostatement.bindvalue.php
    public function bind($param, $value, $type = null)
    {
        if (is_null($type)) {
            switch (true) {
                case is_int($value):
                    $type = PDO::PARAM_INT;
                    break;
                case is_bool($value):
                    $type = PDO::PARAM_BOOL;
                    break;
                case is_null($value):
                    $type = PDO::PARAM_NULL;
                    break;
                default:
                    $type = PDO::PARAM_STR;
            }
        }

        $this->stmt->bindValue($param, $value, $type);
    }

    // Execute the prepared statement
    // https://www.php.net/manual/en/pdostatement.execute.php
    public function execute()
    {
        return $this->stmt->execute();
    }

    // Get results set as an array of objects
    // https://www.php.net/manual/en/pdostatement.fetchall.php
    public function resultSet()
    {
        $this->execute();
        return $this->stmt->fetchAll(PDO::FETCH_OBJ);
    }

    // Get single record as an object
    // https://www.php.net/manual/en/pdostatement.fetch.php
    public function single()
    {
        $this->execute();
        return $this->stmt->fetch(PDO::FETCH_OBJ);
    }

    // Row count
    // https://www.php.net/manual/en/pdostatement.rowcount.php
    public function rowCount()
    {
        return $this->stmt->rowCount();
    }
}
