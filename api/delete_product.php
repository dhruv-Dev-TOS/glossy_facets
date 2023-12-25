<?php
$product_id = $_GET['product_id'];
require_once 'db.php';

$sql = 'DELETE FROM products WHERE id = '.$product_id.'';

if(mysqli_query($link,$sql))
{
echo '<script>window.location.href = "../all_products.php";</script>';
}
else
{
    echo $link->error;
}

?>