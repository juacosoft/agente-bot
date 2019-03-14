<?php
header("Content-Type: application/json");
ob_start();
$requestBody = file_get_contents('php://input'); 
$json = json_decode($requestBody, true);

$text = $json['result']['resolvedQuery'];
$response = json_encode(array(
        "source" => "webhook",
        "speech" => $text,
        "displayText" => $text,
        "contextOut" => array()
    ));

ob_end_clean();
echo $response;
?>
