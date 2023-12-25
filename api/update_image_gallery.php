<?php
require_once 'db.php';

$gallery_id = $_POST['gallery_id'];

$image_name =$_POST['image_name'];
$image_caption = $_POST['image_caption'];


$sql = 'UPDATE gallery
SET
image = "'.$image_name.'",
caption = "'.$image_caption.'" WHERE id = '.$gallery_id.'
';

if(mysqli_query($link,$sql))
{
    $return['message'] = 'Image Gallery updated successfully';
    $return['error_flag'] = 0;
    
}
else
{
    $return['message'] = 'There is an error while updating the image gallery';
    $return['error_flag'] = 1;
    $return['error'] = $link->error;
}
echo json_encode($return);

?>