<?php

class ConnectionBase
{
    private $connection;
    function __construct($database)
    {
        // $hostname = "localhost";
        $hostname = "127.0.0.1";
        $port=80;
        $username = "root";
        $password = "304db";
        
        // Create connection
        $this->connection = new mysqli($hostname, $username, $password,$database,$port);
       
        // check if server is alive
        if ($this->connection->ping()) {
            die("Error: %s\n".$this->connection->error); 
        }
        
        echo "Our connection is ok!"."<br>";

        // Check connection
        if ($this->connection->connect_error) {
          die("Connection failed: " . $this->connection->connect_error);
        }
        echo "Connected successfully";  
        
        return $this->connection;
    }

    function __destruct()
    {
        $this->connection->close();
    }

    function insert(...$values)
    {
        $sql = "INSERT INTO  VALUES (";
        $count = count($values);
        for($i = 0 ; $i<=$count - 1 ;$i++)
        {
            $sql .= '?';
            if($i<$count-1)
            {
                $sql .= ' , ';
            }
            else
            {
                $sql .= ' ) ';
            }
        }
        $sql .= ' ; ';

        $type_s = "";
        for($i = 0 ; $i<=$count - 1 ;$i++)
        {
            $type_s = "s";
        }

        $stmt = $this->connection->prepare($sql);
        $stmt->bind_param($type_s, $values);
        $stmt->execute();

        return $stmt;
    }

    function select(
        $columns,
        $table_name,
        $conditions
        )
    {
        $sql = "SELECT ";
        $count = count($columns);
        for($i = 0 ; $i<=$count - 1 ;$i++)
        {
            $sql .= '?';
            if($i<$count-1)
            {
                $sql .= ' , ';
            }
        }
        $sql = " FROM ";
        $sql .= $table_name;
        if(empty($conditions) != True)
        {
            $sql .= " WHERE ";
            $sql .= $table_name;
        }
        $sql .= " ; ";

        $type_s = "";
        for($i = 0 ; $i<=$count - 1 ;$i++)
        {
            $type_s = "s";
        }

        $stmt = $this->connection->prepare($sql);
        $stmt->bind_param($type_s, $values);
        $stmt->execute();

        return $stmt;
    }
}

?>