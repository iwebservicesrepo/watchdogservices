<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

include './db_connection.php';

$user_id = $_POST['user_id'];
$txn_id = $_POST['data']['id'];
$status = ($_POST['data']['status'] == 'COMPLETED') ? 1 : 0;
$raw = json_encode($_POST['data']);
$today = date('Y-m-d H:i:s');

$sql = "INSERT INTO transaction_histories (user_id, txn_id, status, raw, created_at,updated_at)
VALUES ('" . $user_id . "','" . $txn_id . "','" . $status . "','" . $raw . "','" . $today . "','" . $today . "')";
$thank_you_url = '';
if (mysqli_query($conn, $sql)) {
    $success = true;
    if ($status == 1) {
        $thank_you_url = $base_url . 'thank_you/' . $txn_id;
    }
} else {
    $success = false;
}
echo json_encode(array('success' => $success, 'status' => $status, 'thank_you_url' => $thank_you_url));
