<?php
include 'db_conn.php';
$page = 'home';
include 'header.php'; ?>

<table class="table text-center">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Firstname</th>
      <th scope="col">Lastname</th>
      <th scope="col">Username</th>
      <th scope="col">Password</th>
      <th scope="col">Delete</th>
    </tr>
  </thead>
  <tbody>
    <?php 
        $sql = mysqli_query($conn,"SELECT * FROM users");
        $i = 1;
        while ($row = mysqli_fetch_array($sql)){
            $id = $row['user_id'];
            $firstname = $row['firstname'];
            $lastname = $row['lastname'];
            $username = $row['username'];
            $password = $row['password'];
    ?>
    <tr>
      <th scope="row"><?php echo $i; ?></th>
      <td><?php echo $firstname; ?></td>
      <td><?php echo $lastname; ?></td>
      <td><?php echo $username; ?></td>
      <td><?php echo $password; ?></td>
      <td>
        <form action="action.php" method="post">
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <button type="submit" class="btn btn-danger" name="delete"><i data-feather="trash-2"></i></button>
        </form>
      </td>
    </tr>
    <?php $i++; } ?>
  </tbody>
</table>

<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#staticBackdrop">
  Add User
</button>

<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
        <form action="action.php" method="POST">
            <div class="modal-body">
                <div class="form-group">
                    <label>Username</label>
                    <input type="text" class="form-control" name="username">
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input type="password" class="form-control" name="password">
                </div>
                <div class="form-group">
                    <label>Firstname</label>
                    <input type="text" class="form-control" name="firstname">
                </div>
                <div class="form-group">
                    <label>Lastname</label>
                    <input type="text" class="form-control" name="lastname">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" name="add" class="btn btn-primary">Add</button>
            </div>
        </form>
    </div>
  </div>
</div>

<!-- end modal -->

<?php include 'footer.php';?>