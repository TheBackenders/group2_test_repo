<?php 
class DBConnection extends PDO
{
    public $db_params;
    
    public function __construct()
    {
        $this->db_params = require_once('config.php');
    }
    
    public function getConnection()
    {
        $dsn = "mysql:host={$this->db_params['servername']};dbname={$this->db_params['database']}";
        $username = $this->db_params['username'];
        $password = $this->db_params['password'];
        
        try {
            parent::__construct($dsn, $username, $password);
            $this->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
            return $this;
        } catch (PDOException $e) {
            echo 'Connection failed: ' . $e->getMessage();
        }
    }
}
