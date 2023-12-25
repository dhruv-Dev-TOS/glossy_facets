<?php
require_once 'db.php';
$image_name = $_POST['image_name'];
$image_caption = $_POST['image_caption'];
require_once 'db.php';
$return['message'] = '';

$sql = 'INSERT INTO gallery 
(
    image,
    caption
)
VALUES
(
"' . $image_name . '",    
"' . $image_caption . '"    
)
';

if (mysqli_query($link, $sql)) {
    $return['message'] = 'Image Gallery Data inserted successfully';
    $return['error_flag'] = 0;
} else {
    $return['message'] = 'There is an error while inserting the image gallery data';
    $return['error_flag'] = 1;
    $return['error'] = $link->error;
}
echo json_encode($return);
