<?php

$hostname = "127.0.0.1";
//$hostname = "127.0.0.1:8763";
//$hostname = "127.0.0.1:3307";

$username = "root";

$password = "304db";
// $password = "12";

$port = 8763;
$database = 'account_list';

// $mysqli = new mysqli($hostname, $username, $password, $database,$port);
//$mysqli = new mysqli($hostname, $username, $password, $database);
$mysqli = new mysqli($hostname, $username, $password);

/* check connection */
if ($mysqli->connect_errno) {
    printf("Connect failed: %d\n, Error message:%s\n", $mysqli->connect_errno,$mysqli->connect_error);
    exit();
}

/* check if server is alive */
if ($mysqli->ping()) {
    printf ("Our connection is ok!\n");
} else {
    printf ("Error: %s\n", $mysqli->error);
}

/* close connection */
$mysqli->close();
?>