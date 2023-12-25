<?php
$enq_id = $_GET['enq_id'];
require_once 'db.php';

$sql = 'DELETE FROM b2b_enq WHERE id = ' . $enq_id . '';

if (mysqli_query($link, $sql)) {

    echo '<script>window.location.href = "../view_b2b_enq.php";</script>';
    
} else {
    echo $link->error;
}
