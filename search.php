<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
        integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="footer.css">
    <title>iCoding- Forum</title>
    <link rel="icon" href="img/ico.svg" type="image/x-icon">

    <style>
    #maincontainer {
        min-height: 100vh;
    }
    </style>

</head>

<body>
    <?php include 'header.php'; ?>
    <?php include '_dbconnect.php'; ?>

    <div class="container" id="maincontainer">
        <h4 class="my-3"> Search Result for
            "<?php echo $_GET['search'];  ?>" </h4>
        <?php
    $noresult = true;
    $query = $_GET['search'];
    $sql = "SELECT * FROM threadsu WHERE match(thread_title, thread_desc) against('. $query .')";
    $res  = mysqli_query($conn, $sql);
    while($row = mysqli_fetch_assoc($res)){
        $noresult = false;
    $title= $row['thread_title'];
    $desc = $row['thread_desc'];
    $id = $row['thread_id'];
    echo
    '<div id="mainContent" class="container" style="border:  2px grey solid; border-radius: 5px; padding: 6px; margin: 10px;">
        <div class="row">
            <div class="container col-md-1" style="text-align:center;">
                <img src="img/icon2.png" class="mr-2" width="50px" alt="...">
            </div>
            <div class="media-body col-md-11">
                <h5 class="mt-0"><a class="text-dark" href="thread.php?threadid='. $id .'">'. $title .'</a></h5>
                '. $desc .'
                 <br>
            </div>
        </div>
    </div>';
    }
    if($noresult){
        echo'
        <div class="jumbotron jumbotron-fluid">
        <div class="container">
          <h2 class="display-4">No result found</h2>
          <p class="lead"> Suggestions:
          <ul>
          <li>Make sure that all words are spelled correctly.</li>
          <li>Try different keywords.</li>
          <li>Try more general keywords.</li>
          </ul>
          </p>
          </div>
          </div>';
    }
    ?>




    </div>


    <!-- footer-->
    <?php
          include 'footer.php';
        ?>






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
</body>

</html>