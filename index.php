<?php
$connection = new mysqli("localhost", "root", "", "psr_4");
// Check connection
if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}else{
    echo 'co';
}