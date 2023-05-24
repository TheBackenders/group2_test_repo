<?php
namespace models;
require __DIR__.'/connection.php';

class baseModel
{
    public $connection;
    
    public function __construct()
    {
        $dbHandle = new DBConnection();
        $this->connection = $dbHandle->getConnection();
    }
    
    public function show($table_name, $args)
    {
        $columns = implode(',', $args);
        $query = "SELECT $columns FROM $table_name";
        $stmt = $this->connection->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
 
  
   
    public function update($table_name, $args, $condition)
    {
        $set_values = '';
        foreach ($args as $key => $value) {
            $set_values .= "$key = :$key, ";
        }
        $set_values = rtrim($set_values, ', ');
        $query = "UPDATE $table_name SET $set_values WHERE $condition";
        $stmt = $this->connection->prepare($query);
        foreach ($args as $key => $value) {
            $stmt->bindValue(":$key", $value);
        }
        $stmt->execute();
        return $stmt->rowCount();
    }
    function insertData($table, $data)
    {
     
        $fields = implode(',', array_keys($data));
        $placeholders = ':' . implode(',:', array_keys($data));
        $sql = "INSERT INTO $table ($fields) VALUES ($placeholders)";
        try {
            $stmt = $this->connection->prepare($sql);
            foreach ($data as $field => $value) {
                $stmt->bindValue(':' . $field, $value);
            }
            $stmt->execute();
            $count = $stmt->rowCount();
            return $count;
        } catch (PDOException $e) {
            // Log or handle the error appropriately
            throw new Exception($e->getMessage());
        }
    }


    function deleteData($table, $where)
    {
    $stmt = $this->connection->prepare("DELETE FROM $table WHERE $where");
    $stmt->execute();
    $count = $stmt->rowCount();
    
    if ($count > 0) {
    echo "success";
    } else {
    echo   "failur";
    } 
    }


}