<?php
// $return['message'] = '';
// if ($_FILES['file']['error'] === UPLOAD_ERR_OK) {
//     $tempFile = $_FILES['file']['tmp_name'];

//     // Generate a unique filename using a timestamp and random number
//     $uniqueFilename = time() . '_' . mt_rand(1000, 9999);
//     $targetPath = '../uploads/';
//     $targetFile = $targetPath . $uniqueFilename . '_' . basename($_FILES['file']['name']);

//     if (move_uploaded_file($tempFile, $targetFile)) {
//     $return['message'] = 'Image uploaded successfully';
//     $return['error_flag'] = 0;
//     $return['file_name'] =  $uniqueFilename . '_' . basename($_FILES['file']['name']);
//     } else {
//         $return['message'] = 'Error moving file';
//         $return['error_flag'] = 1;
//     }
// } else {
//     $return['message'] = 'Error updating file';
//     $return['error_flag'] = 1;
// }
// echo json_encode($return);
?>


<?php
$return['message'] = '';
$uploadedFiles = [];

foreach ($_FILES as $fileKey => $file) {
    if ($file['error'] === UPLOAD_ERR_OK) {
        $tempFile = $file['tmp_name'];

        // Generate a unique filename using a timestamp and random number
        $uniqueFilename = time() . '_' . mt_rand(1000, 9999);
        $targetPath = '../uploads/';
        $targetFile = $targetPath . $uniqueFilename . '_' . basename($file['name']);

        if (move_uploaded_file($tempFile, $targetFile)) {
            $uploadedFiles[$fileKey] = $uniqueFilename . '_' . basename($file['name']);
        } else {
            $return['message'] = 'Error moving file';
            $return['error_flag'] = 1;
        }
    } else {
        $return['message'] = 'Error updating file';
        $return['error_flag'] = 1;
    }
}

if (empty($return['error_flag'])) {
    $return['message'] = 'Files uploaded successfully';
    $return['error_flag'] = 0;
    $return['file_name_1'] = $uploadedFiles['file1']; // Assuming 'file1' is the key for the first file input
  // Assuming 'file3' is the key for the third file input
}

echo json_encode($return);
?>

