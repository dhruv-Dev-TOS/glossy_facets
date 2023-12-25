<?php
$video_gallery_id = $_POST['video_gallery_id'];

$video_gallery_link =$_POST['video_gallery_link'];
$video_caption = $_POST['video_caption'];
require_once 'db.php';
$return['message']  = '';


$sql = '';

if(mysqli_query($link,$sql))
{
    $return['message'] = 'Video gallery is updated successfully';
    $return['error_flag']  = 0;
}
else
{
    $return['message'] = 'There is an error while updating the video gallery';
    $return['error_flag'] = 1;
    $return['error'] = $link->error;
}
echo json_encode($return);

?>