<?php 

include 'db_conn.php';
include 'header.php';

if(isset($_GET['error'])){
    $err_msg = $_GET['error'];
}
?>

<div class="container my-5">
    <div class="row">
        <div class="col">

        </div>
        <div class="col m-5 p-5">
            <form action="action.php" method="post">
              <div class="form-group">
                <label>Username</label>
                <input type="text" name="username" class="form-control">
              </div>
              <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" class="form-control <?php echo $err_msg; ?>">
                <div class="invalid-feedback">
                The password you have entered is incorrect.
                </div>
              </div>
              <button type="submit" name="login" class="btn btn-primary">Login</button>
            </form>
        </div>
    </div>
</div>


<?php include 'footer.php'; ?>