<?php
$id = $_GET['id'];
require_once 'db.php';

$sql = 'DELETE FROM gallery WHERE id = ' . $id . '';

if (mysqli_query($link, $sql)) {

    echo '<script>window.location.href = "../view_image_gallery.php";</script>';
    
} else {
    echo $link->error;
}
