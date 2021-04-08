<?php
// Include config file
require_once "config.php";
 
// Define variables and initialize with empty values
$phonename = $phonemodel = $message = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
   // Get username & password
       $phonename = trim($_POST["PhoneName"]);
       $phonemodel = trim($_POST["PhoneModel"]);  
       
   // Prepare an insert statement
   $sql = "INSERT INTO phones (phonename, phonemodel) VALUES (?, ?)";
       
       // Use DB info in $link from config.php to construct MySQL message/command
       if($stmt = mysqli_prepare($link, $sql)){
 
           // Bind variables to the prepared statement as parameters
           mysqli_stmt_bind_param($stmt, "si", $param_phonename, $param_phonemodel);
           
           // Set parameters
           $param_phonename = $phonename;
           $param_phonemodel = $phonemodel;
           
           // Attempt to EXECUTE the prepared statement
           mysqli_stmt_execute($stmt);            
 
           // Close statement
           mysqli_stmt_close($stmt);
           $message = "The phone you have entered is Successfully registered !";
 
       } else {
                $message = "Problems with inserting to Database";            
       }
 
   // Close connection
   mysqli_close($link);
}
?>
 
<html>
<head>
   <title>Registration</title>
</head>
<body>
 
<?php echo $message; ?>
 
</body>
</html>

