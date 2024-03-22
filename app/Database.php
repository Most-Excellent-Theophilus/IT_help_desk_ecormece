<?php


abstract class Database
{
    protected $pdo;

    public function __construct()
    {
        $pdo = new PDO('sqlite:database/database.sqlite');
        $this->pdo = $pdo;
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    abstract protected function getTableName(): string;


    public function create(array $data)
    {
        $columns = implode(', ', array_keys($data));
        $values = ':' . implode(', :', array_keys($data));

        $sql = "INSERT INTO {$this->getTableName()} ($columns, created_at, updated_at) VALUES ($values, :created_at, :updated_at)";

        $currentDateTime = date("Y-m-d H:i:s");
        $dates = ['created_at' => $currentDateTime, 'updated_at' => $currentDateTime];
        $sqlData = $data + $dates;

        try {
            $stmt = $this->pdo->prepare($sql);
            $result = $stmt->execute($sqlData);
            if ($result) {
               return ['status' => 'success', 'message' => 'Row created'];
                
            } else {
               return  ['status' => 'fail', 'message' => 'Unable to create row'];
            }
        } catch (PDOException $e) {
           return ['status' => 'error', 'message' => 'Query failed: ' . $e->getMessage()];
        }
    }

    public  function read($id)
    {
        $sql = "SELECT * FROM {$this->getTableName()} WHERE id = :id";

        try {
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindParam(':id', $id);
            $stmt->execute();
           $result = $stmt->fetch(PDO::FETCH_ASSOC);
           if ($result) {
           return ['status' => 'success', 'data' => $result];

           } else{
           return ['status' => 'fail', 'message' => 'no such row'];

           }
            
        } catch (PDOException $e) {
           return ['status' => 'error', 'message' => 'Query failed: ' . $e->getMessage()];
            
        }
    }

    public  function update($id, array $data)
    {
        $setClause = '';
        foreach ($data as $key => $value) {
            $setClause .= "$key = :$key, ";
        }
        $setClause = rtrim($setClause, ', ');
        $currentDateTime = date("Y-m-d H:i:s");
        $data = $data + array("updated_at" => $currentDateTime);

        $sql = "UPDATE {$this->getTableName()} SET $setClause, updated_at = :updated_at WHERE id = :id";
        // echo $sql;

        try {
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindParam(':id', $id);
            $dat =  $stmt->execute($data);
            if ($dat) {
               return ['status' => 'success', 'message' =>'Row updated'];

            } else {
               return ['status' => 'fail', 'message' =>'Row Not updated'];


            }
        } catch (PDOException $e) {
           return ['status' => 'error', 'message' => 'Query failed: ' . $e->getMessage()];

        }
    }

    public  function delete($id)
    {
        $sql = "DELETE FROM {$this->getTableName()} WHERE id = :id";

        try {
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindParam(':id', $id);
            $result =  $stmt->execute();
            if ($result) {
        
               return ['status' => 'success', 'message' =>'row deleted'];

            } else {
               return  ['status' => 'fail', 'message' => 'unable to delete row'];

            }
        } catch (PDOException $e) {
           return ['status' => 'error', 'message' => 'Query failed: ' . $e->getMessage()];
        }
    }
    public function find($conditions)
    {
        // Example: $conditions = ['id' => 1];
        $whereClause = implode(' AND ', array_map(fn ($key) => "$key = :$key", array_keys($conditions)));

        $sql = "SELECT * FROM {$this->getTableName()} WHERE $whereClause";

        try {
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute($conditions);
            $result = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($result) {
               return ['status' => 'success', 'data' => $result];
            } else {
                return  ['status' => 'fail', 'message' => 'No matching record found'];
            }
        } catch (PDOException $e) {
           return ['status' => 'error', 'message' => 'Query failed: ' . $e->getMessage()];
        }
    }
    public  function getAll()
    {
        $sql = "SELECT * FROM {$this->getTableName()}";

        try {
            $stmt = $this->pdo->query($sql);
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            if ($result) {
                return ['status' => 'success', 'data' => $result]; 
            } else {
                return ['status' => 'fail', 'message' => 'Unable to get data'];
            }
        } catch (PDOException $e) {
           return ['status' => 'error', 'message' => 'Query failed: ' . $e->getMessage()] ;
        }
    }
}
