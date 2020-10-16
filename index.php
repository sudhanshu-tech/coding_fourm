<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="footer.css">
    <title>iCoding- Forum</title>
    <link rel = "icon" href =  
"img/ico.svg" 
        type = "image/x-icon"> 

</head>

<body>
    <?php include 'login.php'; ?>
    <?php session_start(); ?>
    <?php include '_dbconnect.php'; ?>
    <?php include 'header.php'; ?>
 


    <div class="container-fluid mx-0" style="padding-left: 0px; padding-right: 0px;">
        <div id="carouselExampleIndicators" class="carousel slide " data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="img/s1.jpg" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="img/s2.jpg" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="img/s3.jpg" class="d-block w-100" alt="...">
                </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>

    </div>
    <div class="container col-md-1  my-3"></div>

    <div class="container col-md-9">
        <h2 class="text-center">Browse Your category</h2>
        <div class="row">
            <?php include '_dbconnect.php'; ?>
            <?php
       // session_start();    
        if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true){
           // $loggedin = true;
       // $userid = $_GET['userid']; 
        $sql= "SELECT * FROM `categoryu`";
        $result = mysqli_query($conn, $sql);
        while($row= mysqli_fetch_assoc($result)){
            $id = $row['item_id'];
            $title = $row['category_title'];
            $decs = $row['categoty_desc'];
            //echo $row['item_id'];
           // echo $row['category_title'];
            echo '<div class=" col-md-4 my-2 ">
            <div class="card" style="width: 18rsem;">
                <img src="https://source.unsplash.com/500x400/?coding,'. $title .'" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title"><a href="/forum/catetheards.php?cardid='. $id . '&userid='. $_SESSION['userid'] .'">'. $title .'</a></h5>
                    <p class="card-text">'. substr($decs, 0 , 100) .'...</p>
                    <a href="/forum/catetheards.php?cardid= '. $id .'" class="btn btn-primary">View Thread</a>
                </div>
            </div>
        </div>';
            }
       }
        
   else{
           $loggedin = false;
          $sql= "SELECT * FROM `categoryu`";
          $result = mysqli_query($conn, $sql);
          while($row= mysqli_fetch_assoc($result)){
              $id = $row['item_id'];
              $title = $row['category_title'];
              $decs = $row['categoty_desc'];
              //echo $row['item_id'];
             // echo $row['category_title'];
              echo '<div class=" col-md-4 my-2 ">
              <div class="card" style="width: 18rsem;">
                  <img src="https://source.unsplash.com/500x400/?coding,'. $title .'" class="card-img-top" alt="...">
                  <div class="card-body">
                      <h5 class="card-title"><a href="/forum/catetheards.php?cardid='. $id .'">'. $title .'</a></h5>
                      <p class="card-text">'. substr($decs, 0 , 100) .'...</p>
                      <a href="/forum/catetheards.php?cardid= '. $id .'" class="btn btn-success">View Thread</a>
                  </div>
              </div>
          </div>';
              }
            }
?>
 

        </div>
    </div>
    <?php
  include 'footer.php';
  ?>

 

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous">
    </script>
</body>

</html>