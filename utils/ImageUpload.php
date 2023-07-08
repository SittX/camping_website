<?php
require_once(dirname(__DIR__) . "/classes/DatabaseConnection.php");

function uploadImage($campSiteID)
{
    $db = new DatabaseConnection();
    $conn = $db->getConnection();

    $uploadDir = dirname(__DIR__) . "/uploads/";
    $allowedFileExtensions = array('jpg', 'png', 'jpeg');

    $statusMsg = $errorMsg = $insertSqlValues = $errorUpload = '';
    $fileNames = $_FILES['files']['name'];

    if (empty($fileNames)) {
        return 'Please select a file to upload.';
    }

    foreach ($fileNames as $key => $val) {
        // File upload path
        $fileName = basename($_FILES['files']['name'][$key]);
        $uploadFilePath = $uploadDir . $fileName;
        $fileExtension = pathinfo($uploadFilePath, PATHINFO_EXTENSION);

        // Check whether file type is valid
        if (!in_array($fileExtension, $allowedFileExtensions)) {
            return "File type is not supported";
        }

        // Upload file to server
        $isUploaded = move_uploaded_file($_FILES["files"]["tmp_name"][$key], $uploadFilePath);
        if (!$isUploaded) {
            return "Error uploading file to the destination";
        }

        $insertSqlValues .= "('" . $fileName . "', $campSiteID),";
    }

    if (empty($insertSqlValues)) {
        return "File upload failed";
    }

    // Remove the comma of the last element
    $insertSqlValues = trim($insertSqlValues, ',');

    // Insert image file name into database
    $result = $conn->query("INSERT INTO CampSiteImages(url, site_id) VALUES $insertSqlValues");
    if ($result && $result->num_rows > 0) {
        return "Successfully saved data into the database";
    } else {
        return "Sorry, there was an error uploading your file.";
    }
}

