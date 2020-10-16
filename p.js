$(document).ready(function() {

    // like and unlike click
    $(".like, .unlike").click(function() {
        var id = this.id; // Getting Button id
        var split_id = id.split("_");

        var text = split_id[0];
        var postid = split_id[1]; // postid

        // Finding click type
        var type = 0;
        if (text == "like") {
            type = 1;
        } else {
            type = 0;
        }

        // AJAX Request
        $.ajax({
            url: 'likeunlike.php',
            type: 'post',
            data: { postid: postid, type: type },
            dataType: 'json',
            success: function(data) {
                var likes = data['likes'];
                var unlikes = data['unlikes'];


                console.log('SUCCESS')






            }

        });

    });

});


<
div class = "container my-3" >
    <
    div class = "jumbotron" >
    <
    h1 class = "display-4" > <?php echo $title; ?> < /h1> <
    p class = "lead" >
    <?php echo $decs; ?> <
    /p>
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
             ?> <
hr class = "my-4" >
    <
    p > It uses utility classes
for typography and spacing to space content out within the larger container. < /p> <
    p style = "display: inline;" > Posted by: < b > <?php echo $username;  ?> < /b></p > at <
    p style = "display:inline; color:rgba(33, 152, 231, 0.842);" >
    <?php echo $comtime;  ?> < /P>

<
/div>






 
 