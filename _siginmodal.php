<!-- Button trigger modal -->


<?php


echo   ' 

<!-- Modal -->
<div class="modal fade" id="siginModal" tabindex="-1" role="dialog" aria-labelledby="siginModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="siginModalLabel">Sign in</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
         
      <form action="insertdata.php" method="post" >
      <div class="form-group">
        <label for="exampleInputEmail1">User Name</label>
        <input type="text" class="form-control" id="username" name= "username" aria-describedby="emailHelp">
        
      </div>
      <div class="form-group">
        <label for="exampleInputEmail1">Email Address</label>
        <input type="email" class="form-control" id="email" name= "email" aria-describedby="emailHelp">
        <small id="emailHelp" class="form-text text-muted">We\'ll never share your email with anyone else.</small>
      </div>
      <div class="form-group">
        <label for="exampleInputPassword1">Password</label>
        <input type="password" class="form-control" id="pass" name="pass">
      </div>

      <div class="form-group">
        <label for="exampleInputPassword1">Conform Password</label>
        <input type="password" class="form-control" id="cpass" name="cpass">
      </div>
    
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Sigin</button>
      </div>
    </form>

      </div>
      
    </div>
  </div>
</div>';
?>