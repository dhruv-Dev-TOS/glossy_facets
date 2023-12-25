<?php
$id = $_GET['id'];
require_once 'db.php';

$sql = 'DELETE FROM video_gallery WHERE id = ' . $id . '';

if (mysqli_query($link, $sql)) {

    echo '<script>window.location.href = "../view_video_gallery.php";</script>';
    
} else {
    echo $link->error;
}
