<style>
nav{
  position:fixed;  
	z-index:10;  
	width:100%;

}

</style>

<?php 
 
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true){
  $loggedin = true;
}
else{
  $loggedin = false;
}

echo '<nav class="navbar navbar-expand-lg navbar-light bg-light">
<a class="navbar-brand" href="#">
<!-- <img style ="border: white solid; border-radius: 50%;" src="img/Logo.jpeg" width="40" height="40" alt="Logo" loading="lazy"> -->
<b><h5 style="font-family: inherit; color: aquamarine; text-shadow: 2px  1px 3px darkgray; font-size: x-large;">CodingBazar</h5></b>
</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="/Forum/index.php">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">About US!!!</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        Top Category
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">';
        $sql= "SELECT * FROM `categoryu`  Orders LIMIT 8";
        $result = mysqli_query($conn, $sql);
        while($row= mysqli_fetch_assoc($result)){
        echo  '<a class="dropdown-item" href="/forum/catetheards.php?cardid='. $row['item_id'] .'"> '.$row['category_title'].' </a>';
        }
        echo'</div>
        <li class="nav-item">
          <a class="nav-link" href="/Forum/contact.php">Contact</a>
        </li>


      </li>
     
    </ul>
   
     <form class="form-inline my-2 my-lg-0" action="search.php" method="get" >
      <input class="form-control mr-sm-2" type="search" name="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-success my-2 my-sm-0">Search</button>
      
      </form>';
      if($loggedin==false){
        echo
        '<button class="btn btn-outline-success my-2 my-sm-0 mx-2" onclick="getURL();" type="button" data-toggle="modal" data-target="#siginModal" >Sigin</button>
          <button class="btn btn-outline-success my-2 my-sm-0"  data-toggle="modal" data-target="#loginModal">Login</button>';
      }
      else{  
        $head= $_SESSION['usern'];
         echo "<h5 style='color: aquamarine; padding: 5px;'>Hello!  $head  </h5>";
        echo '<a href="/Forum/logout.php" ><button class="btn btn-outline-success my-2 my-sm-0" data-toggle="modal" >Logout</button></a>'; 
   
         } 
        
 echo '</div>
</nav>'; 
include '_loginmodal.php';
include '_siginmodal.php';

if(isset($_GET['signupsuccess']) && $_GET['signupsuccess'] == "true"){
  echo '<div class="alert alert-success alert-dismissible fade show my-0" role="alert">
  <strong>Success </strong>Sigin successfuy....
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';
}
?>
