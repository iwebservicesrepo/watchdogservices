<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

include './db_connection.php';

$fname = trim($_POST['fname']);
$lname = trim($_POST['lname']);
$email = trim($_POST['email']);
$phone = trim($_POST['phone']);
$street_address = trim($_POST['street_address']);
$apt_unit = trim($_POST['apt_unit']);
$city = trim($_POST['city']);
$state = trim($_POST['state']);
$zip = trim($_POST['zip']);
$price = trim($_POST['price']);
$today = date('Y-m-d H:i:s');
$str_result = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghjklmnopqrstuvwxyz';
$user_code = substr(str_shuffle($str_result),
        0, 5);

$sql = "INSERT INTO users (user_code, price, first_name,last_name, email, phone, street_address, apt_unit, city, state, zip, created_at, updated_at, email_verified_at)
VALUES ('" . $user_code . "','" . $price . "','" . $fname . "','" . $lname . "','" . $email . "','" . $phone . "','" . $street_address . "','" . $apt_unit . "','" . $city . "','" . $state . "','" . $zip . "','" . $today . "','" . $today . "','" . $today . "')";

if (mysqli_query($conn, $sql)) {
    $last_id = mysqli_insert_id($conn);
    $checkout_url = $base_url . 'checkout/' . base64_encode($last_id);
} else {
    $checkout_url = '';
}
echo json_encode(array('checkout_url' => $checkout_url));
