<?php
include_once("../classes/DatabaseConnection.php");

function uploadImage($campSiteID)
{
    $db = new DatabaseConnection();
    $conn = $db->getConnection();

    $uploadDir = "../uploads/";
    $allowedFileExtensions = array('jpg', 'png', 'jpeg');

    $statusMsg = $errorMsg = $insertValues = $errorUpload = $errorUploadType = '';
    $fileNames = array_filter($_FILES['files']['name']);

    if (empty($fileNames)) {
        $statusMsg = 'Please select a file to upload.';
        return;
    }

    foreach ($_FILES['files']['name'] as $key => $val) {
        // File upload path 
        $fileName = basename($_FILES['files']['name'][$key]);
        $uploadFilePath = $uploadDir . $fileName;
        // Check whether file type is valid 
        $fileExtension = pathinfo($uploadFilePath, PATHINFO_EXTENSION);
        if (!in_array($fileExtension, $allowedFileExtensions)) {
            $errorUploadType .= $_FILES['files']['name'][$key] . ' | ';
            return;
        }
        // Upload file to server 
        $isUploaded = move_uploaded_file($_FILES["files"]["tmp_name"][$key], $uploadFilePath);
        if (!$isUploaded) {
            $errorUpload .= $_FILES['files']['name'][$key] . ' | ';
            return;
        }
        $insertValues .= "('" . $fileName . "', $campSiteID),";
    }


    if (empty($insertValues)) {
        $statusMsg = "Upload failed! " . $errorMsg;
        return;
    }

    // Remove the comma of the last element
    $insertValues = trim($insertValues, ',');

    // Insert image file name into database 
    $result = $conn->query("INSERT INTO CampSiteImages(url,site_id) VALUES $insertValues");
    if ($result->num_rows < 0) {
        echo "Successfully saved data into the database";
    }

    // $insert = $db->query("INSERT INTO CampSiteImages (url,site_id) VALUES $insertValues");
    // if ($insert) {
    //     $statusMsg = "Successfully uploaded." . $errorMsg;
    // } else {
    //     $statusMsg = "Sorry, there was an error uploading your file.";
    // }
}
