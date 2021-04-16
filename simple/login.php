<?php
 
// Include config file
require_once "config.php";
 
// Define variables and initialize with empty values
$phonename = $phonemodel = $message = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
       $phonename = trim($_POST["PhoneName"]);
       $phonemodel = trim($_POST["PhoneModel"]);
 
   // Validate credentials
 
       // Prepare a select statement
       $sql = "SELECT id, phonename, phonemodel FROM phones WHERE phonename = ?";
       
       if($stmt = mysqli_prepare($link, $sql)){
           // Bind variables to the prepared statement as parameters
           mysqli_stmt_bind_param($stmt, "s", $param_phonename);
           
           // Set parameters
           $param_phonename = $phonename;
           
           // Attempt to execute the prepared statement
           if(mysqli_stmt_execute($stmt)){
               // Store result
               mysqli_stmt_store_result($stmt);
               
               // Check if username exists, if yes then verify password
               if(mysqli_stmt_num_rows($stmt) == 1){                    
                   // Bind result variables
                   mysqli_stmt_bind_result($stmt, $id, $phonename, $h_phonemodel);
                if(mysqli_stmt_fetch($stmt)){
                 if($phonemodel == $h_phonemodel){
                           $message = "The phone that you have entered already exists!";
 
                       } else{
                           // Display an error message 
                           $message = "The phone that you have entered does not exist.";
                       }
                              }
               }else{
                $message  = "The phonemodel you enterd dosen't exist";
               }
           }
 
           // Close statement
           mysqli_stmt_close($stmt);
       }
   
   // Close connection
   mysqli_close($link);
}
?>
 
<html>
<head>
   <title>LOGIN</title>
</head>
<body>
 
<?php echo $message; ?>
 
</body>
</html>
