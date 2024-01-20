<?php include 'header.php';
   $id =  $_GET['id'];
   if (empty($id)) 
   {
      header("location:user.php");
   }
   $sql = "SELECT * FROM user WHERE user_id = '$id'";
   $query = mysqli_query($config, $sql);
   $rows = mysqli_fetch_assoc($query);

   if (isset($_POST['edit_user'])) 
   {
      $role = mysqli_real_escape_string($config, $_POST['user_role']);
      $sql2 = "UPDATE user SET role = '{$role}' WHERE user_id = '{$id}' ";
      $update = mysqli_query($config, $sql2);
      if ($update) 
      {
         $msg = ['User Role has been Set Successfully', 'alert-success'];
         $_SESSION['msg']=$msg;
         header("location:user.php");
      }
      else
      {
         $msg = ['Failed, Please try again', 'alert-danger'];
         $_SESSION['msg']=$msg;
         header("location:user.php");
      }
   }
?>
<div class="container-fluid" id="adminpage">
   <h5 class="mb-2 text-gray-800">User Info</h5>
   <div class="row">
      <div class="col-xl-6 col-lg-5">
         <div class="card">
            <div class="card-header">
               <h6 class="font-weight-bold text-secondary mt-2">Edit User Role</h6>
            </div>
            <div class="card-body">
               <div class="text-center">
                  <img src="assits/img/user/profile.svg" width="100px" height="100px" class="rounded-circle">
               </div>
               <p class="ps-3 text-secondary"><?= $rows['username'] ?></p>
               <p class="ps-3 text-secondary"><?= $rows['email'] ?></p>
               <form action="" method="POST">
                  <div class="mb-3">
                     <select class="form-control" required name="user_role">
                        <option value="">Select Role</option>
                        <option value="1">Admin</option>
                        <option value="0">User</option>
                     </select>
                  </div>
                  <div class="mb-3">
                     <input type="submit" name="edit_user" value="Edit" class="btn btn-secondary">
                     <a href="user.php" class="btn btn-danger">Back</a>
                  </div>
               </form>
            </div>
         </div>
      </div>
   </div>
</div>
<?php include 'footer.php'; 
   
?>
