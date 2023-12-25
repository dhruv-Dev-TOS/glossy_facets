<?php
$order_id = $_GET['order_id'];
require_once 'db.php';

$sql = 'DELETE FROM orders WHERE id = ' . $order_id . '';

if (mysqli_query($link, $sql)) {
    echo '<script>window.location.href = "../all_orders.php";</script>';
} else {
    echo $link->error;
}
