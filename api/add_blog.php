<?php
$blog_title = $_POST['blog_title'];
$blog_image = $_POST['blog_image'];
$blog_short_desc = $_POST['blog_short_desc'];
$blog_long_desc = $_POST['blog_long_desc'];
require_once 'db.php';
$return['message'] = '';
date_default_timezone_set("Asia/Calcutta");
$datetime   = new DateTime();
$created_at = date('Y-m-d');

$sql = 'INSERT INTO blogs(blog_image,
blog_title,
short_description,
long_description,
last_updated
)
VALUES
(
    "' . $blog_image . '",
    "' . $blog_title . '",
    "' . $blog_short_desc . '",
    "' . $blog_long_desc . '",
    "'.$created_at.'"
)
';

if (mysqli_query($link, $sql)) {
    $return['message'] = "Blog inserted successfully";
    $return['error_flag'] = 0;
} else {
    $return['message'] = "There is an error while inserting the blog";
    $return['error_flag'] = 1;
    $return['error']  = $link->error;
}
echo json_encode($return);
