<?php
header("Content-Type:application/json");
require "data.php";

if(!empty($_GET['name']) and !empty($_GET['phonemodel']))
{
$name=$_GET['name'];
$phonemodel=$_GET['phonemodel'];

$r = get_phonemodel($name,$phonemodel);

if(empty($r))
{
response(200,"phone Not Found",NULL);
}
else
{
response(200,"phone Found",$r);
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
$response['data is correct']=$data;

$json_response = json_encode($response);
echo $json_response;
}
?>