<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

if (isset($_SERVER['HTTPS'])) {
    $protocol = ($_SERVER['HTTPS'] && $_SERVER['HTTPS'] != "off") ? "https://" : "http://";
} else {
    $protocol = 'http://';
}
$base_url = $protocol . $_SERVER['SERVER_NAME'].'/';

$host = "localhost";
$user = "watch_dog_user";
$password = ",o;*VD.w3aGP";
$dbName = "watch_dog_db";
$port = "3306";
$conn = new mysqli($host, $user, $password, $dbName, $port);

// Check connection
if ($conn->connect_errno) {
    echo "Failed to connect to MySQL: " . $mysqli->connect_error;
    exit();
}

