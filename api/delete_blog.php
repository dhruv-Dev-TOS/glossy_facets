<?php
$blog_id = $_GET['blog_id'];
require_once 'db.php';

$sql = 'DELETE FROM blogs WHERE id = ' . $blog_id . '';

if (mysqli_query($link, $sql)) {

    echo '<script>window.location.href = "../blogs.php";</script>';
    
} else {
    echo $link->error;
}
