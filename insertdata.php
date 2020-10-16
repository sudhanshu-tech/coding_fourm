 

<?php
   $url = "http://"; 
   $url.= $_SERVER['HTTP_HOST'];   
   $url.= $_SERVER['REQUEST_URI'];    
  
   echo $url;
$showError= "false";
if($_SERVER['REQUEST_METHOD'] == 'POST'){
 include '_dbconnect.php'; 
$confirm_code=md5(uniqid(rand()));
$name= $_POST['username'];
$email = $_POST['email'];
$pass1= $_POST['pass'];
$pass2 =$_POST['cpass'];
$cname = ucfirst($name);
 
$existuser = "SELECT * FROM `usersu` WHERE email = '$email';";
$result = mysqli_query($conn, $existuser);
$numRow= mysqli_num_rows($result);
if($numRow>0){
   $showError = "Email Already in use";
}
else{
   if($pass1  == $pass2){
      $hash= password_hash($pass1, PASSWORD_DEFAULT);
      echo $hash;
      $sql= "INSERT INTO `usersu` ( `confirm_code`, `user_name`, `email`, `password`, `utime`) VALUES ('$confirm_code', '$cname', '$email', '$hash', current_timestamp());";
      //die($sql);
      $result= mysqli_query($conn, $sql);
      if($result){
         $showAlert=true;
         header("Location: /Forum/index.php?signupsuccess=true");
         exit();
   
         }
      }

      else{
         $showError = "Password do not match";
   }
   }
  
  header("Location: /Forum/index.php?signupsuccess=false&error=$showError");
 
}

?>