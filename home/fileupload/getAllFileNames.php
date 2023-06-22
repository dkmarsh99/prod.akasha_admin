<?php

error_reporting(0);
header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $curl = curl_init();

    // Used to obtain access token
    curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://accounts.accesscontrol.windows.net/22f2e6ab-2679-4d69-bee1-2e15c1fdb411/tokens/OAuth/2',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS => 'grant_type=client_credentials&client_id=968a5c85-cbfb-4cc1-9b17-d7815b0a3a81%4022f2e6ab-2679-4d69-bee1-2e15c1fdb411&client_secret=wIbA8OWy2duiFbqdQpF9SlZQRRdoQT30%2F%2FQv%2B1PsZ1o%3D&resource=00000003-0000-0ff1-ce00-000000000000%2Fphoenixsoftwareconz.sharepoint.com%4022f2e6ab-2679-4d69-bee1-2e15c1fdb411',
        CURLOPT_HTTPHEADER => array(
            'Content-Type: application/x-www-form-urlencoded',
            'Cookie: esctx=AQABAAAAAAD--DLA3VO7QrddgJg7Wevrs8Wq_L3obOQdC2UBA1U6_iv-keQLW59Wc8N1I2PJxBph0IaALJgxgGl1KndlLUuSPuWvTg16LA2bXcPcaHh80oaaZ_BeZtXPrQdlcPLK4JyO7e_drMEOVw3CqCr8eDd77QItcTs5pNRFKpjPhUFKEHtj2ZyRPxO-hc-qy59WzQAgAA; fpc=Asl-PxueJ9BFv_m7dPG__QUSZcbmAQAAAGLN5tcOAAAA; stsservicecookie=estsfd; x-ms-gateway-slice=estsfd'
        ),
    ));

    $response = curl_exec($curl);
    curl_close($curl);

    $accessToken = json_decode($response)->access_token;
    //$usename = $_GET["name"];

    $curl = curl_init();

    curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://phoenixsoftwareconz.sharepoint.com/_api/web/GetFolderByServerRelativeUrl(\'/Shared%20Documents\')/Files',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'GET',
        CURLOPT_HTTPHEADER => array(
            'Accept: application/json;odata=verbose',
            'Authorization: Bearer ' . $accessToken
        ),
    ));

    $response = curl_exec($curl);

    curl_close($curl);
    $response = json_decode($response);

    $apiResponse = new \stdClass();
    $apiResponse->fileNames = [];
    foreach ($response->d->results as $file) {
        $fileName = explode("/", $file->ServerRelativeUrl)[2];
        array_push($apiResponse->fileNames, $fileName);
    }

    echo json_encode($apiResponse);
}
