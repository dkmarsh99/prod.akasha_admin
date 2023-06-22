<?php
header('Content-Type: application/json');

require_once './vendor/autoload.php';

use Office365\SharePoint\ClientContext;
use Office365\SharePoint\File;

// Turn off vanilla PHP error reporting - not needed
error_reporting(0);

$clientId = "968a5c85-cbfb-4cc1-9b17-d7815b0a3a81";
$clientSecret = "wIbA8OWy2duiFbqdQpF9SlZQRRdoQT30//Qv+1PsZ1o=";

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    try {
        $fileName = $_GET["fileName"];
        //$fileName = "Jon Doe-Bank Statement.css";
        $sourceFileUrl = "/Shared Documents/" . $fileName;
        $targetPath = "./tmp/" . $fileName;
        $url = "https://phoenixsoftwareconz.sharepoint.com/";

        $ctx = ClientContext::connectWithClientCredentials($url, $clientId, $clientSecret);
        $fileContent = Office365\SharePoint\File::openBinary($ctx, $sourceFileUrl);

        // Temporarly download file to our server so user can download it
        file_put_contents($targetPath, $fileContent);

        $attachment_location = $targetPath;
        if (file_exists($attachment_location)) {

            header($_SERVER["SERVER_PROTOCOL"] . " 200 OK");
            header("Cache-Control: public"); // needed for internet explorer
            header("Content-Type: application/zip");
            header("Content-Transfer-Encoding: Binary");
            header("Content-Length:" . filesize($attachment_location));
            header("Content-Disposition: attachment; filename=" . $fileName);
            readfile($attachment_location);

            // Delete TMP file
            unlink($targetPath);

            //die();
        } else {
            die("Error: File not found.");
        }
    } catch (Exception $e) {
        print_r($e);
    }
}
