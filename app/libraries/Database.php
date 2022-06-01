<?php
/*
    *PDO Database Class
    *Connect to database
    *Create prepared statements
    *Bind Values
    *Return rows and results
*/
class Database {
    private $host = DB_HOST;
    private $user = DB_USER;
    private $pass = DB_PASS;
    private $dbname = DB_NAME;

    
    // Database_handler & statement(query) & error
    private $dbh;
    private $stmt;
    private $error;


    public function __construct(){
        // Set DSN
        $dsn = 'mysql:host=' . $this->host . ';dbname=' . $this->dbname;
        $options = array(
            PDO::ATTR_PERSISTENT => true, // This will check if there is an extablished connection
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ
        );

        // Create PDO instance
        try {
            $this->dbh = new PDO($dsn, $this->user, $this->pass, $options);
        } catch (PDOException $e) {
            $this->error = $e->getMessage();
            echo $this->error;
        }
    }

    // Prepare statement with query
    public function query($sql){
        $this->stmt = $this->dbh->prepare($sql);
    }
    
    // Bind Values
    public function bind($params, $value, $type = null){
        if(is_null($type)){
            switch(true){
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

        $this->stmt->bindValue($params, $value, $type);
    }

    // Execute the prepared statement
    public function execute(){
        return $this->stmt->execute();
    }

    // Get result set as an array of objects
    public function resultSet(){
        $this->execute();
        return $this->stmt->fetchAll();
    }

    // Get single result as an object
    public function SingleResult(){
        $this->execute();
        return $this->stmt->fetch();
    }

    // Get row count
    public function rowCount(){
        $this->execute();
        return $this->stmt->rowCount();
    }

}