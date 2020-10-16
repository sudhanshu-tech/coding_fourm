<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
        integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/highlight.js/10.1.0/styles/default.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- <script src="//cdn.ckeditor.com/4.11.1/standard/ckeditor.js"></script> -->
    <script src="ckeditor/ckeditor.js"></script>
    <link rel="stylesheet" type="text/css" href="footer.css">
    <title>Hello, world!</title>
</head>

<body>
    <?php session_start(); ?>
    <?php include '_dbconnect.php'; ?>
    <?php include 'header.php'; ?>

    <?php
    $id = $_GET['threadid'];
    $sql= "SELECT threadsu.thread_title, threadsu.thread_desc, threadsu.th_code, threadsu.thread_id, threadsu.timestamp, usersu.user_name FROM threadsu INNER JOIN usersu ON threadsu.thread_user_id = usersu.userid WHERE threadsu.thread_id = $id";
    $result = mysqli_query($conn, $sql);
    while($row= mysqli_fetch_assoc($result)){
        $title = $row['thread_title'];
        $decs = $row['thread_desc'];
        $username= $row['user_name'];
        $comtime  = $row['timestamp'];
        $th_code = $row['th_code'];
     //   $date=date_create($comtime);
       // $date2 =date_format($date,"M d'y H:i");
         

    }
    
    ?>

    <?php
    if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true){
     $userid = $_SESSION['userid'];
    $shoeAlert1= false; 
    $id = $_GET['threadid'];
    $method  =$_SERVER['REQUEST_METHOD'];
    if($method=='POST'){
        $comment_content= mysqli_real_escape_string($conn, $_POST['comment_content']);
        $cm_code = $_POST['code'];
        $code_desc = $_POST['code_desc'];
      //  echo $comment_content;
       if ($comment_content == ""){
           echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
           <strong>Warning </strong>please fill the text!!
           <button type="button" class="close" data-dismiss="alert" aria-label="Close">
             <span aria-hidden="true">&times;</span>
           </button>
         </div>';
       }
       else{
        $sql= "INSERT INTO `commentsu` ( `comment_content`,`code`, `code_desc`, `comment_by`, `thread_id`, `comment_time`) VALUES ( '$comment_content','$cm_code', '$code_desc', '$userid', '$id', current_timestamp());";
        $result = mysqli_query($conn, $sql);
        $shoeAlert1 = true;
        if($shoeAlert1){
            echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Suceess! </strong>Your comment has been added! Thanks for commenting.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>';
        }

    }
    }
    }
    else{
        echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
        <strong>Suceess! </strong>Your are not loggedin.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>'; 
    }
    ?>


    <!-- jambotron -->

    <div class="container my-3">
        <div class="jumbotron">
            <h2 class="lead"><b><?php echo $title; ?></b></h2>
            <p class="lead">
                <?php echo $decs; ?>
            </p>
            <?php 
            if($th_code!= ""){
     
                echo   '<div>
            <figure>   
                <pre>
                    <code>
                        '. $th_code .'
                    </code>
                </pre>
            </figure>
                </div>';
             }
             ?>
            <hr class="my-4">
            <p>It uses utility classes for typography and spacing to space content out within the larger container.</p>
            <p style="display: inline;"> Posted by: <b><?php echo $username;  ?></b></p> at
            <p style="display:inline; color:rgba(33, 152, 231, 0.842);">
                <?php echo $comtime;  ?> </P>

        </div>



    </div>

    <div class="container">
        <h2 class="py-3">Post a Comment</h2>
        <form action="<?php echo $_SERVER['REQUEST_URI'] ?>" method="post">

            <button onclick="myFunction()" type="button" style="margin:2px;">For code</button>
            <div id="myDIV" class="container" style="display:none; margin-bottom: 5px;">
                <label for="exampleFormControlTextarea1">For Code</label><br>
                <textarea id="editor1" name='code'></textarea>
                <label for="exampleInputEmail1">Code Description</label>
                <textarea id="code_desc" class="form-control" placeholder="@Code Description" rows="1"
                    name='code_desc'></textarea>
            </div>

            <div class="form-group">
                <!-- <label for="exampleFormControlTextarea1">Question Descrption</label> -->
                <textarea class="form-control" minlength="18" id="comment_content" placeholder="@Your Answer"
                    name="comment_content" rows="3"></textarea>
            </div>
            <button type="submit" class="btn btn-success">Post your Comment</button>
        </form>
    </div>

    <div class="container">
        <h2 class="py-3">Discussion</h2>

        <?php
    $id = $_GET['threadid'];
    $sql= "SELECT commentsu.comment_content, commentsu.code, commentsu.code_desc, commentsu.comment_time, commentsu.thread_id, usersu.user_name FROM commentsu INNER JOIN usersu ON commentsu.comment_by = usersu.userid WHERE thread_id=$id order by comment_id desc";
    $result = mysqli_query($conn, $sql);
    while($row= mysqli_fetch_assoc($result)){
        $id  = $row['thread_id'];
        $comment_content = $row['comment_content'];
        $code= $row['code'];
        $code_desc = $row['code_desc'];
        $ctime = $row['comment_time'];
        $comment_by = $row['user_name'];
        $date=date_create($ctime);

        $date1 =date_format($date,"M d'y H:i");
         

        echo   ' 
        <div class="container" style=" border: 2px gray solid; border-radius: 5px; padding: 6px; margin: 10px;">
        <div class="row">
        <div class="container col-md-1" style="text-align:center;">
        <img src="img/icon3.jpg" class="mr-2" width=40px alt="..." >
        </div>
        <div class="media-body col-md-11">
        <p>  ' . $comment_content . ' </p>';
        
        if($code!= ""){
             
            echo   ' <div>
         <figure>
            <pre>
                <code style="border: 1px gray solid; border-radius: 5px;">
                   '. $code .'
                </code>
            </pre>
        </figure>
             </div>

            <div>
            <p> '. $code_desc .' </p>
            </div>
            ';
           }
          
       echo '<div class="my-2">
        <img src="img/1.jpg" class="mr-2" width=40px alt="..." style="display:inline;">
          <h5 style="color: rgba(20, 19, 19, 0.842); display:inline;">Posted by: '. $comment_by .'</h5> 
           <h5 style=" color: rgba(33, 152, 231, 0.842);font-size: small;font-family: sans-serif; display:inline;">   '. $date1 .'</h5>
           </div>  
        </div>
        </div>
        </div> ';

         

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
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"
        integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous">
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
    <script type="text/javascript">
    // // Initialize CKEditor
    // CKEDITOR.inline( 'short_desc',{
    //     width: "1000px",
    //   height: "100px"
    // });

    // CKEDITOR.replace('long_desc',{

    //   width: "1000px",
    //   height: "200px"

    // }); 
    CKEDITOR.replace('editor1');
    </script>
    <script>
    document.body.style.zoom = "90%"
    </script>
</body>

</html>