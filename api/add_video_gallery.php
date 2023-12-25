<?php
$video_gallery_link = $_POST['video_gallery_link'];
$video_name = $_POST['video_name'];
require_once 'db.php';
$return['message']  = '';

$sql = 'INSERT INTO video_gallery
(
    video,
    caption
)
VALUES
(
    "'.$video_gallery_link.'",
    "'.$video_name.'"
)
';


if(mysqli_query($link,$sql))
{

    $return['message'] = 'Video Gallery is uploaded successfully';
    $return['error_flag'] = 0;

}
else
{
    $return['message'] = 'There is an error while adding video gallery';
    $return['error_flag'] = 1;
    $return['error'] = $link->error;

}
echo json_encode($return);
?>