<?php
$blog_title = $_POST['blog_title'];
$blog_image = $_POST['blog_image'];
$blog_short_desc = $_POST['blog_short_desc'];
$blog_long_desc = $_POST['blog_long_desc'];
$blog_id = $_POST['blog_id'];
require_once 'db.php';
$return['message'] = '';
date_default_timezone_set("Asia/Calcutta");
$datetime   = new DateTime();
$created_at = date('Y-m-d');

$sql = 'UPDATE blogs SET  
blog_title = "' . $blog_title . '",
blog_image = "' . $blog_image . '",
short_description = "' . $blog_short_desc . '",
long_description = "' . $blog_long_desc . '" WHERE id = ' . $blog_id . '
';

if (mysqli_query($link, $sql)) {
    $return['message'] = "Blog updated successfully";
    $return['error_flag'] = 0;
} else {
    $return['message'] = "There is an error while updating the blog";
    $return['error_flag'] = 1;
    $return['error']  = $link->error;
}
echo json_encode($return);
