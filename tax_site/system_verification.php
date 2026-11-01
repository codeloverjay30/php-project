<?php
$include_urls = [
    'modules/connection_base.php'
];
foreach($include_urls as $include_url)
{
include_once($include_url);
}

$database = 'account_list';

$connection = new ConnectionBase($database);

echo 'A success ConnectionBase';

$columns = ['accountname','password_name'];
$table_name = 'account_list';
$conditions = ['1'];

?>