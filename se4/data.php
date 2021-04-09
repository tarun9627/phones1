<?php

function get_phonemodel($name, $phonemodel)
{
        /* Database INFO */
$servername = "us-cdbr-east-03.cleardb.com";
$username = "b2ca6fbf8a3e2c";
$password = "a40a7933";
$dbname = "heroku_d1695ff1876190e";

        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
       }

       $sql = "SELECT phonemodel FROM phones WHERE phonename = '$name'";
       $result = $conn->query($sql);

        if ($result->num_rows > 0) {
             // output data of each row
             while($row = $result->fetch_assoc()) {
                      $p = $row["phonemodel"];
      }
    } else {
                     $p = null;
        }

    $conn->close();

if ($p == $phonemodel)
  {
    return "true";
  }
else
 {
  return "false";

 }

}

?>
