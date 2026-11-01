<?php
//$hostname = "127.0.0.1";
$hostname = "localhost";
//$hostname = "127.0.0.1:8763";
//$hostname = "127.0.0.1:3307";

$username = "root";

$password = "304db";
// $password = "12";

$port = 8763;
$database = 'account_list';

class Variable
{
    public static function var_dump($result)
    {
        echo '<br>';
        var_dump($result);
        echo '<br>';
    }
    public static function dash_line()
    {
        echo "-------------------------------------"."<br>";
    }
}

try {
  $pdo_driver = "mysql:host=".$hostname.";"."dbname=".$database.";";

  Variable::dash_line();
  Variable::var_dump($pdo_driver);
  Variable::dash_line();

  $conn = new PDO($pdo_driver, $username, $password);
  
  Variable::dash_line();
  echo "The error info of conn:"."<br>";
    Variable::var_dump($conn->errorInfo());
    Variable::dash_line();

  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  echo "Connected successfully";
} catch(PDOException $e) {
  echo "Connection failed: <br>"."The error code:".$e->getCode() ."<br>"."The error message:". $e->getMessage()
        ."<br>";
  echo "The error info:"."<br>";

    Variable::var_dump($e->errorInfo);    

  echo "The error trace:"."<br>";
    Variable::var_dump($e->getTrace());
}
?>