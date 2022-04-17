<?php

// Set your API key & Customer ID  Your API key can be found by going to your account dashboard and clicking on EDI Access. If you are running this file from a public folder, use an include command and store your actual key in a non public folder.
 $api_key = "<Your API KEY>";

//if you are using an include statement just uncomment and edit below as needed
#include("file/path/to/key.php");

// Set your customer ID, you can find your customer id on your Dropship Town account dashboard
 $customer_id = 0; //  Your customer id #

// enter the order id you are requesting, you can either enter your PO#, or the Dropship Town Order #

 $order_id = "<Your Order #>";
 
 // enter the order_id type, enter self_po if you are using your own PO number, enter dt_order if you are searching for a Dropship Town order number
 
 $order_id_type = "self_po"; // change to dt_order if you want to search by DST order number
 
 
 
$url = "https://www.dropshiptown.com/api/order_update.php/";
$client = curl_init();
$curlConfig=[
CURLOPT_URL => $url,
CURLOPT_POST => true,
CURLOPT_RETURNTRANSFER  => true,
CURLOPT_POSTFIELDS  => http_build_query([
'api_key' => $api_key,
'customer_id' => $customer_id,
'order_id_type' => $order_id_type,
'order_id' => $order_id
])
];
     
     
     curl_setopt($client, CURLOPT_ENCODING, '');
curl_setopt_array($client, $curlConfig);

// Receive our response and process via your own code

$response = curl_exec($client);
#print_r($response);
$response=rtrim($response, PHP_EOL);
$arr = explode(PHP_EOL, $response);
$json=[];
$json[] = json_decode($response, TRUE);

print_r($json);
 
