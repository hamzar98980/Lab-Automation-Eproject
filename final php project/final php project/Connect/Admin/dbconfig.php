<?php
$host = "localhost";
$username = 'root';
$password = '';
$database = 'labdata';

$con = new mysqli($host, $username, $password, $database);

if($con-> connect_error)
{
    die('Connection Error');
}


?>