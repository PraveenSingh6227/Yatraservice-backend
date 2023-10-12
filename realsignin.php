<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: Content-Type");
header("Content-Type: application/json");
$rest_json = file_get_contents("php://input");
$_POST = json_decode($rest_json, true);

  //URL, Where the JSON data is going to be sent
  // sending post request to reqres.in
  $url = "https://api.fly24hrs.com/api/Login/Token";
 
  //initialize CURL
  $ch = curl_init();
 
 $LoginId = "sewaow@gmail.com";
 $Password = "apiUser";
 $APIKey = "8FFA90A1-0459-43EC-BDA8-B77D3BCA57A7";
 
 
  //setup json data and using json_encode() encode it into JSON string
  $data = array(
'LoginId' => $LoginId,
'Password' => $Password,
'APIKey' => $APIKey,
    );
  $new_data = json_encode($data);


 
  //options for curl
  $array_options = array(
     
    //set the url option
    CURLOPT_URL=>$url,
     
    //switches the request type from get to post
    CURLOPT_POST=>true,
     
    //attach the encoded string in the post field using CURLOPT_POSTFIELDS
    CURLOPT_POSTFIELDS=>$new_data,
     
    //setting curl option RETURNTRANSFER to true
    //so that it returns the response
    //instead of outputting it
    CURLOPT_RETURNTRANSFER=>true,
     
    //Using the CURLOPT_HTTPHEADER set the Content-Type to application/json
    CURLOPT_HTTPHEADER=>array('Content-Type:application/json')
  );
 
  //setting multiple options using curl_setopt_array
  curl_setopt_array($ch,$array_options);
 
  // using curl_exec() is used to execute the POST request
  $resp = curl_exec($ch);
 
    //decode the response

    // var_dump($resp);
$array = json_decode($resp, true);
 // $object = (json_decode(stripslashes($resp)));
// print_r($array);


 echo json_encode($array);

echo 
// var_dump($array);
  //close the cURL and load the page
  curl_close($ch);
?>