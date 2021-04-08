<?php
header("Content-Type:application/json");
require "data.php";

if(!empty($_GET['name']))
{
$name=$_GET['name'];
$phonemodel = get_phonemodel($name);

if(empty($phonemodel))
{
response(200,"phone Not Found",NULL);
}
else
{
response(200,"phone Found",$phonemodel);
}
}
else
{
response(400,"Invalid Request",NULL);
}

function response($status,$status_message,$data)
{
header("HTTP/1.1 ".$status);

$response['status']=$status;
$response['status_message']=$status_message;
$response['data']=$data;

$json_response = json_encode($response);
echo $json_response;
}
?>