<?php

class db extends mysqli
{
    private $db_host;
    private $db_user;
    private $db_pass;
    private $db_name;
    private $persistent;

    public function __construct($db_host, $db_user, $db_pass, $db_name, $persistent = true)
    {
        $this->db_host = $db_host;
        $this->db_user = $db_user;
        $this->db_pass = $db_pass;
        $this->db_name = $db_name;
        $this->persistent = $persistent;

        parent::init();
        parent::options(MYSQLI_OPT_CONNECT_TIMEOUT, 1);
        @parent::real_connect(($this->persistent ? 'p:' : '') . $this->db_host, $this->db_user, $this->db_pass, $this->db_name);

        if ($this->connect_errno)
        {
            die("All DB servers down!\n". $this->connect_errno);
        }
    }

    public function ping()
    {
        @parent::query('SELECT LAST_INSERT_ID()');

        if ($this->errno == 2006)
        {
            $this->__construct($this->db_host, $this->db_user, $this->db_pass, $this->db_name, $this->persistent);
        }
    }
}

class Variable
{
    public static function var_dump($result)
    {
        echo '<br>';
        var_dump($result);
        echo '<br>';
    }
}

$hostname = "127.0.0.1";
$username = "root";
$password = "304db";
$database = 'account_list';

$db = new db($hostname, $username, $password, $database);

$db->ping();
// Now we should be able to run queries again
$result = $db->query('SELECT LAST_INSERT_ID()');

Variable::var_dump($result);

// Now we should be able to run queries again
$result = $db->query('SELECT * FROM account_list ; ');

Variable::var_dump($result);
?>