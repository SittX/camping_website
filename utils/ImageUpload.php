<?php
require_once(dirname(__DIR__) . "/classes/DatabaseConnection.php");

function uploadImage($campSiteID)
{
    $db = new DatabaseConnection();
    $conn = $db->getConnection();

    $uploadDir = dirname(__DIR__) . "/uploads/";
    $allowedFileExtensions = array('jpg', 'png', 'jpeg');

    $statusMsg = $errorMsg = $insertSqlValues = $errorUpload = '';
    $fileNames = array_filter($_FILES['files']['name']);

    if (empty($fileNames)) {
        return $statusMsg = 'Please select a file to upload.';
    }

    foreach ($_FILES['files']['name'] as $key => $val) {
        // File upload path 
        $fileName = basename($_FILES['files']['name'][$key]);
        $uploadFilePath = $uploadDir . $fileName;
        $fileExtension = pathinfo($uploadFilePath, PATHINFO_EXTENSION);

        // Check whether file type is valid
        if (!in_array($fileExtension, $allowedFileExtensions)) {
            echo "File type is not supported";
            return;
        }
        // Upload file to server 
        $isUploaded = move_uploaded_file($_FILES["files"]["tmp_name"][$key], $uploadFilePath);
        if (!$isUploaded) {
            echo "Error uploading file to the destination";
            return;
        }
        $insertSqlValues .= "('" . $fileName . "', $campSiteID),";
    }


    if (empty($insertSqlValues)) {
        echo "File upload failed";
        return;
    }

    // Remove the comma of the last element
    $insertSqlValues = trim($insertSqlValues, ',');

    // Insert image file name into database 
    $result = $conn->query("INSERT INTO CampSiteImages(url,site_id) VALUES $insertSqlValues");
    if ($result->num_rows < 0) {
        echo "Successfully saved data into the database";
    }

    // $insert = $db->query("INSERT INTO CampSiteImages (url,site_id) VALUES $insertSqlValues");
    // if ($insert) {
    //     $statusMsg = "Successfully uploaded." . $errorMsg;
    // } else {
    //     $statusMsg = "Sorry, there was an error uploading your file.";
    // }
}
