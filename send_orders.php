<?php

// Set your API key & Customer ID  Your API key can be found by going to your account dashboard and clicking on EDI Access. If you are running this file from a public folder, use an include command and store your actual key in a non public folder.
 $api_key = "<Your API KEY>";

//if you are using an include statement just uncomment and edit below as needed
#include("file/path/to/key.php");

// Set your customer ID, you can find your customer id on your Dropship Town account dashboard
 $customer_id = 0; //  Your customer id #

// leave live mode at 0 to test your code without processing any orders, Once you have successful responses, change to 1 to send live orders
 $live_mode=0; 
 


// You can create your own code here to loop through and get all the following order information. You will replace the test data with your own data below
$orders=[];

foreach($your_order as $order){
$products=[];
$signature_delivery=0; // 0=no signature, 1=signature delivery + $4.75

$num++;
 $first_name = "Test";
 $last_name = "User";
 $address_1 = "123 Test Dr";
 $address_2 = "Apt 202";
 $city = "Somecity";
 $state = "Somestate";
 $zip = "12345";
 $country = "US";
 $phone = "800-123-4567";
 $po_number = "PO123456";
 $shipping_method = "Best Way"; // available options: Best Way Ground, 3 Day Select, 2nd Day Air, Next Day Air
 
// create loop to add your product data to the array


$sku='';
$qty='';

 $products[]=['product_sku' => $sku, 'order_qty' => $qty];
 
 
// Add all above data to your orders array, before looping through to the next order


$orders[]=array("first_name" => $first_name, "last_name" => $last_name, "address_1" => $address_1, "address_2" => $address_2, "city" => $city, "state" => $state, "zip" => $zip, "country" => $country, "phone" => $phone, "po_number" => $po_number, "shipping_method" => $shipping_method, "signature_delivery" => $signature_delivery, "products" => $products);

}


// End your loops of collecting order information here, and send the orders to Dropship Town


$url = "https://www.dropshiptown.com/api/get_orders.php/";
$client = curl_init();
$curlConfig=[
CURLOPT_URL => $url,
CURLOPT_POST => true,
CURLOPT_RETURNTRANSFER  => true,
CURLOPT_POSTFIELDS  => http_build_query([
'api_key' => $api_key,
'customer_id' => $customer_id,
'live_mode' => $live_mode,
'orders' => $orders
])
];
curl_setopt_array($client, $curlConfig);

// Receive our response and process via your own code
$response = curl_exec($client);
$response=rtrim($response, PHP_EOL);
$arr = explode(PHP_EOL, $response);
$json=[];
foreach($arr as $line){
    $json[] = json_decode($line, TRUE);
}
print_r($json);





