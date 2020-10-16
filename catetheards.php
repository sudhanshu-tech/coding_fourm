<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/highlight.js/10.1.0/styles/default.min.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- //  <script src="//cdn.ckeditor.com/4.14.1/full/ckeditor.js"></script> -->
    <script src="ckeditor/ckeditor.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="footer.css">



    <title>Hello, world!</title>
</head>


<body>
    <?php session_start(); ?>
    <?php include '_dbconnect.php'; ?>
    <?php include 'header.php'; ?>

    <?php
    $id = $_GET['cardid'];
    $sql= "SELECT * FROM `categoryu` WHERE item_id = $id";
    $result = mysqli_query($conn, $sql);
    while($row= mysqli_fetch_assoc($result)){
        $title = $row['category_title'];
        $decs = $row['categoty_desc'];
         

    }
    
    ?>
        <?php   $ip = $_SERVER['REMOTE_ADDR'];  
       
?>
        <?php
  // $userid  = $_GET['userid']; 
    $shoeAlert1= false; 
    $method  =$_SERVER['REQUEST_METHOD'];
    if($method=='POST'){
        $th_title= mysqli_real_escape_string($conn, $_POST['title']);
        $th_desc = mysqli_real_escape_string($conn, $_POST['desc']);
        $th_code = $_POST['code'];
        $code_desc= mysqli_real_escape_string($conn,  $_POST['code_desc']);
        
         
        if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true){
          $loggedin = true;

        
        }
        else{
            $loggedin = false;
            
        }
        if($loggedin){
                    if($th_desc == "" or $th_title==""){
                        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>Alert! </strong>Empty query has not acceptiable
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>';
                    }
                    else{

                        $userid  = $_SESSION['userid']; 
                        $sql= "INSERT INTO `threadsu` ( `thread_title`, `thread_desc`,`th_code`,`code_desc`, `thread_cat_id`, `thread_user_id`, `timestamp`) VALUES ( '$th_title', '$th_desc', '$th_code','$code_desc', '$id', '$userid', current_timestamp())";
                        $result = mysqli_query($conn, $sql);
                        $shoeAlert1 = true;
                        if($shoeAlert1){
                            echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>Suceess! </strong>Your thread has been add please wait for answer.
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>';
                    }
                    }
                }
                if(!$loggedin){
                            echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>Alert! </strong>Your not loggedin Plaese login first...
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>';
                }
    }
        
    

    

    ?>
            <!-- jambotron -->
            <div class="container my-3">
                <div class="jumbotron">
                    <h1 class="display-4">Welcome to
                        <?php echo $title; ?> Forum </h1>
                    <p class="lead">
                        <?php echo $decs; ?>.</p>
                    <hr class="my-4">
                    <p>It uses utility classes for typography and spacing to space content out within the larger container.</p>
                    <a class="btn btn-success btn-lg" href="#" role="button">Learn more</a>
                </div>



            </div>
            <div class="container">
                <h2 class="py-3">Ask a Question</h2>
                <form action="<?php echo $_SERVER['REQUEST_URI'] ?>" method="post">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Thread title</label>
                        <input type="text" class="form-control" placeholder="@Question Title" id="title" name="title" minlength="10" aria-describedby="emailHelp">
                        <small id="emailHelp" class="form-text text-muted">Write your question sort as possible as</small>
                    </div>
                    <button onclick="myFunction()" type="button">For code</button>
                    <div id="myDIV" style="display:none;">
                        <label for="exampleFormControlTextarea1">For Code</label>
                        <!-- <textarea id='short_desc' name='' style='border: 1px solid black;' rows="3">  </textarea><br> Long Description: -->
                        <textarea id="editor1" name='code'></textarea>
                        <label for="exampleInputEmail1">Code Description</label>
                        <textarea id="code_desc" class="form-control" placeholder="@Code Description" rows="1" name='code_desc'></textarea>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">Question Descrption</label>
                        <textarea class="form-control" id="desc3" minlength="18" placeholder="@Question Descrption" name="desc" rows="3"></textarea>
                    </div>
                    <button type="submit" class="btn btn-success">Submit</button>
                </form>
            </div>
            <div class="container">
                <h2 class="py-3">Browse Questions</h2>

                <?php
    // if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true){
       // $userid = $_SESSION['userid'];
    $id = $_GET['cardid'];
    // $sql= "SELECT * FROM `threads` WHERE thread_cat_id = $id";
    $sql = "SELECT threadsu.thread_title, threadsu.thread_desc, threadsu.th_code, threadsu.code_desc, threadsu.thread_id, threadsu.timestamp, usersu.user_name FROM threadsu INNER JOIN usersu ON threadsu.thread_user_id = usersu.userid WHERE threadsu.thread_cat_id = $id order by thread_id desc";
    $result = mysqli_query($conn, $sql);
    $noResult = true;
    while($row= mysqli_fetch_assoc($result)){
        $noResult = false;
        $id  = $row['thread_id'];
        $title = $row['thread_title'];
        $decs = $row['thread_desc'];
        $code=  $row['th_code'];
        $code_desc= $row['code_desc'];
       // $thread_userid  =$row['thread_user_id'];
        $user_name = $row['user_name'];
        $ctime  = $row['timestamp'];
        $date = date_create($ctime);
        $date3 = date_format($date,"M d'y H:i");

        $sql1 = "SELECT * FROM `like_unlike` WHERE `post_id` = $id";
        $result1 = mysqli_query($conn, $sql1 );
        $row1= mysqli_fetch_assoc($result1);
          
        $like  = $row1['like_count'];

        echo   '<div id="mainContent"  class="container" style="border:  2px grey solid; border-radius: 5px; padding: 6px; margin: 10px;">
        <div class="row">
        <div class="container col-md-1" style="text-align:center;">
        <img src="img/icon2.png" class="mr-2"  width=50px alt="...">
        </div>
        <div class="media-body col-md-11" >
        
         
            <h5 class="mt-0"><a class = "text-dark" href= "thread.php?threadid='. $id .'">' . $title .  '</a></h5>
             ' . $decs . ' <br> ';
            if($code!= ""){
             
             echo   '<div>
        <figure> 
             <pre>
                 <code style="border:1px grey solid; border-radius:5px;">
                    '. $code .'
                 </code>
             </pre>
        </figure>
             </div> 

               <div>
             <p> '. $code_desc .'</p> 
             </div>';
            }

            echo '<div class="my-2" >
             <img src="img/1.jpg" class="mr-2" style="display:inline;" width=40px alt="...">
             <h5 style="color: rgba(20, 19, 19, 0.842); display:inline;"  >Posted by:  '. $user_name .'</h5>
             <h4 style=" color: rgba(33, 152, 231, 0.842);font-size: small;font-family: sans-serif; display:inline;"> at '. $date3 .' </h4>
            </div>';
            ?>
                    <!-- <a href="javascript:void(0)"   onclick="like_update(<?php echo $id ?>)" ><i class="fa fa-thumbs-o-up" style="font-size:24px"></i> 
            <span class="glyphicon glyphicon-thumbs-up"> (<span id="like_loop_<?php echo $id ?>"><?php echo $like ?></span>)</span>

            </a> -->
                    <?php
      echo  '</div>
        
        </div>
        </div>';
    }
    ?>
                        <?php
    if($noResult){
        echo '<div class="jumbotron jumbotron-fluid">
        <div class="container">
          <h1 class="display-4">No threads founds</h1>
          <p class="lead">Be the frist person to ask a question</p>
          </div>
          </div>';
        }
    ?>
            </div>
  <?php
  include 'footer.php';
  ?>

                          


            <script src="//cdnjs.cloudflare.com/ajax/libs/highlight.js/10.1.0/highlight.min.js"></script>
            <script>
                hljs.initHighlightingOnLoad();
            </script>
            <!-- Optional JavaScript -->
            <!-- jQuery first, then Popper.js, then Bootstrap JS -->
            <!-- <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"> -->
            </script>
            <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
            <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
            </script>
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous">
            </script>
            <script>
                function myFunction() {
                    var x = document.getElementById("myDIV");
                    if (x.style.display === "none") {
                        x.style.display = "block";
                    } else {
                        x.style.display = "none";
                    }
                }
            </script>
            <script>
                function like() {
                    console.log('sdcs')
                }
            </script>

            <script type="text/javascript">
                // // Initialize CKEditor
                // CKEDITOR.inline('short_desc');

                // CKEDITOR.replace('long_desc', {

                //     width: "1100px",
                //     height: "200px"

                // });
                CKEDITOR.replace('editor1');
            </script>
            <script>
                document.body.style.zoom = "90%"
            </script>

            <script>
                function like_update(id) {
                    jQuery.ajax({
                        url: 'update_count.php',
                        type: 'post',
                        data: 'type=like&id=' + id,
                        success: function(result) {
                            var cur_count = jQuery('#like_loop_' + id).html();
                            cur_count++;
                            jQuery('#like_loop_' + id).html(cur_count);


                        }

                    });
                }
            </script>
</body>

</html>