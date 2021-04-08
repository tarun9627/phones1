<?php
header("Content-Type:application");
require "data.php";

if(!empty($_GET['name']))
{
$name=$_GET['name'];
$phonemodel = get_phonemodel($name);

if(empty($phonemodel))
{
response(NULL);
}
else
{
response($phonemodel);
}
}
else
{
response(NULL);
}

function response($data)
{
header("HTTP/1.1 ");

echo $data;
}

?>