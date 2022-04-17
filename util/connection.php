<?php

session_start();
$host = "host = 127.0.0.1";
$port = "port = 5432";
$dbname = "dbname = db_kampus";
$username = "user = postgres";
$password = "password = 12345";

$connection = pg_connect("$host $port $dbname $username $password");
if ($connection) {
    echo "Connected";
} else {
    echo "Cant Connect";
}

?>