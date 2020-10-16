<?php include '_dbconnect.php'; ?>
<?php
$ip = $_SERVER['REMOTE_ADDR'];
$type = $_POST['type'];
$id = $_POST['id'];
// $sql1 = "SELECT * FROM `like_unlike` WHERE `ip`=$ip and `post_id`= $id";
// $res1  = mysqli_query($conn, $sql1);
// $numrow = msqli_num_rows($row1);
// if($numrow==1){
    
// }
// else{

    if($type=='like'){
        $sql= "UPDATE `like_unlike` SET `ip` = '$ip', `like_count` = `like_count`+1 WHERE `post_id` = $id;";
        $res = mysqli_query($conn, $sql);
    }
//}
 
?>