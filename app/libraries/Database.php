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

        // Create PDO instance
        try {
            $this->dbh = new PDO($dsn, $this->user, $this->pass, $options);
        } catch (\PDOException $e) {
            $this->error = $e->getMessage();
            echo $this->error;
        }
    }
}
