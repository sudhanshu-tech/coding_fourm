<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
        integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="footer.css">
    <title>Contact us</title>

</head>

<body>
    <?php include 'header.php'; ?>

    <div class="container my-3 w-150%">
        <div style="text-align:center" class="my-2">
            <h4>Contact Us</h4>
        </div>

        <form>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputEmail4">Name</label>
                    <input type="name" class="form-control" id="inputEmail4">
                  </div>
                  <div class="form-group col-md-6">
                      <label for="inputEmail4">Email</label>
                      <input type="email" class="form-control" id="inputPassword4">
                    </div>
                
                  <div class="form-group col-md-6">
                      <label for="inputEmail4">Phone</label>
                      <input type="phone" class="form-control" id="inputPassword4">
                    </div>
              </div>
            <div class="form-group">
            <label for="inputAddress">Your Message</label>
            <textarea id="code_desc" class="form-control" placeholder="@Code Description" rows="3" name='code_desc'></textarea>
                <!-- <label for="inputAddress">Address</label>
                <input type="text" class="form-control bfh-phone" data-format="+1 (ddd) ddd-dddd" id="inputAddress" placeholder="1234 Main St">
            </div>
            <div class="form-group">
                <label for="inputAddress2">Address 2</label>
                <input type="text" class="form-control" id="inputAddress2" placeholder="Apartment, studio, or floor"> -->
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputCity">City</label>
                    <input type="text" class="form-control" id="inputCity">
                </div>
                <div class="form-group col-md-4">
                    <label for="inputState">State</label>
                    <select id="inputState" class="form-control">
                        <option selected>Choose...</option>
                        <option>...</option>
                    </select>
                </div>
                <div class="form-group col-md-2">
                    <label for="inputZip">Zip</label>
                    <input type="text" class="form-control" id="inputZip">
                </div>
            </div>
          
            <button type="submit" class="btn btn-primary">Send</button>
        </form>
    </div>

    <?php
  include 'footer.php';
  ?>
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
