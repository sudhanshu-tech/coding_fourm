<!-- this is login page  -->
<?php
 
$login  = false;
$showError= "false";
//$_SESSION['loggedin'] = false;
if($_SERVER['REQUEST_METHOD']=="POST"){
    include '_dbconnect.php'; 
    $email= $_POST['email'];
    $pass= $_POST['password'];
    echo $pass; 


    $sql = "SELECT * FROM `usersu` where email= '$email'";
    $result= mysqli_query($conn, $sql);
    $numrow = mysqli_num_rows($result);
   // echo $numrow;
    if($numrow==1){
       // $hash= password_hash($pass, PASSWORD_DEFAULT);
        while($row=mysqli_fetch_assoc($result)){
           // echo $row['user_name'];
           //echo $row['password'];
           // $userid = $row['userid'];
           // echo $userid;
            if (password_verify($pass, $row['password'])){
                $login = true;
                echo "if block";
                session_start();
                $_SESSION['start'] = time();
                $_SESSION['loggedin'] = true;
                $_SESSION['email']= $email;
                $_SESSION['userid'] = $row['userid'];
                $_SESSION['usern'] = $row['user_name'];
                echo $_SESSION['userid'];
                $_SESSION['expire'] = $_SESSION['start'] + (20);
               header("Location: /Forum/index.php?loginsuccess=true");
               echo session_status();
               // echo 'wqq';
                //echo $email;
                echo $_SESSION['loggedin'];
            }
            else{
                $showError ="invailid credential";
                header("Location: /Forum/index.php?loginsuccess=false&$showError");
                echo "else block";

            }
          
        }   

    }
    else{
        $showError ="invailid credential";
        header("Location: /Forum/index.php?loginsuccess=false&$showError");

    }
}
?>
