<?php

header('Content-Type: application/json');

require_once './vendor/autoload.php';

use Office365\SharePoint\ClientContext;
use Office365\Runtime\Auth\ClientCredential;

// Turn off vanilla PHP error reporting - not needed
error_reporting(0);

// Suggest storing this somewhere safer ex .env file
$clientId = "e1fb5c8f-56de-4902-bf28-562fa9b47370";
$clientSecret = "qHBnzZzfTOsTff7ZYaGPm5P9VD7IfUjb+SuISQGS2TI=";

//$clientId = "394af918-d19f-4016-98a0-fc99ca478b48";
//$clientSecret = "cTpR9MFGfpykjIK/8iBvsOOMfn0Tn0pWi8GEX5qaveA=";

//$url = "https://phoenixsoftwareconz.sharepoint.com/";

$url = "https://wealthhealth.sharepoint.com/";

// Location of temporary folder
$uploaddir = './tmp/';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $response = new \stdClass();

    $localUploadFile = $uploaddir . basename($_FILES['file']['name']);

    // Save it temporarly to server
    if (move_uploaded_file($_FILES['file']['tmp_name'], $localUploadFile)) {
        try {
            //Rename file
            $name = $_POST["name"];
            $documentName = $_POST["documentName"];
            $path_parts = pathinfo($localUploadFile);
            $newFileName = $uploaddir . $name . "-" . $documentName . "." . $path_parts['extension'];
            rename($localUploadFile, $newFileName);
            $localUploadFile = $newFileName;

            $ctx = ClientContext::connectWithClientCredentials($url, $clientId, $clientSecret);
            $targetLibraryTitle = "Documents";
            $targetList = $ctx->getWeb()->getLists()->getByTitle($targetLibraryTitle);

            $uploadFile = $targetList->getRootFolder()->uploadFile(basename($localUploadFile), file_get_contents($localUploadFile));
            $ctx->executeQuery();

            // Delete tmp file
            unlink($localUploadFile);

            $response->isSuccess = true;
            $response->fileType = $_POST["fileType"];
            $response->message = "File {$uploadFile->getServerRelativeUrl()} has been uploaded!";
        } catch (Exception $e) {
            $response->isSuccess = false;
            $response->message = "Error uploading file to server: " . $e->getMessage();
        }
    } else {
        $response->isSuccess = false;
        $response->message = "Error uploading file to server";
    };

    echo json_encode($response);
}

function uploadFileAlt(ClientContext $ctx, $sourceFilePath, $targetFileUrl)
{
    $fileContent = file_get_contents($sourceFilePath);
    try {
        Office365\SharePoint\File::saveBinary($ctx, $targetFileUrl, $fileContent);
    } catch (Exception $e) {
        $response = new \stdClass();
        $response->isSuccess = false;
        $response->message = "Error uploading file to server";
        echo json_encode($response);
    }
}
