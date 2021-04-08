<?php

function get_phonemodel($name)
{
$phonename = [
"iphone"=>1,
"mi"=>2,
"vivo"=>3
];

foreach($phonename as $phonename=>$phonemodel)
{
if($phonename==$name)
{
return $phonemodel;
break;
}
}
}

?>