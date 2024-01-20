<?php include 'header.php';
    if ($admin != 1) 
    {
        header("location:index.php");
    } 
    // pagination
   if (!isset($_GET['page'])) 
   {
      $page = 1;
   }
   else
   {
      $page = $_GET['page'];
   }
   $limit = 6;
   $offset = ($page - 1) * $limit;
   // -----------	
	$sql = "SELECT * FROM user LIMIT $offset, $limit";
	$query = mysqli_query($config, $sql);
	$row = mysqli_num_rows($query);


	// DELETE QUERY
	if (isset($_POST['delete_user'])) 
   	{
      $id = $_POST['user_id'];
      $delete = "DELETE FROM user WHERE user_id = '$id'";
      $run = mysqli_query($config, $delete);
      if ($run) 
      {
         $msg = ['User has been Deleted Successfully', 'alert-success'];
         $_SESSION['msg']=$msg;
         header("location:user.php");
      }
      else
      {
         $msg = ['Failed, Please try again', 'alert-success'];
         $_SESSION['msg']=$msg;
         header("location:user.php");
      }
   	}
	// ============
?>
<!--=== BODY TABLE START ===-->
<div class="container-fluid" id="adminpage">
    <h5>Users Data</h5>
    <div class="card shadow">
        <div class="card-header py-3 d-flex justify-content-between">
        	<div>&nbsp;</div>
            <div>
                <form class="navbar-search">
                    <div class="input-group">
                       	<input type="text" class="form-control bg-white small" placeholder="Search for...">
                        <div class="input-group-append">
                           	<button class="btn" type="button"> <i class="fa fa-search"></i> </button>
                        </div>
                     </div>
                </form>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-striped" width="100%" cellspacing="0">
                    <thead>
                        <tr class="text-center">
                           	<th>Sr.No</th>
                           	<th>Profile</th>
                           	<th>Username</th>
                           	<th>Email</th>
                           	<th>Role</th>
                           	<th colspan="2">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php                        
                        	if ($row) 
                        	{
                        		while ($result = mysqli_fetch_assoc($query)) { ?>
                        		<tr class="text-center">
                        			<td><?= ++$offset ?></td>
                        			<td>
                                        <img src="" width="50px" height="50px">         
                                    </td>
                        			<td><?= $result['username'] ?></td>
                        			<td><?= $result['email'] ?></td>
                        			<td>
                        			<?php 
                        				$role= $result['role'];
                        				if($role == 1) 
                                       {
                                          echo "Admin";
                                       }
                                       else
                                       {
                                          echo "User";
                                       }      
                        			?>                        			 	
                        			</td>
                        			<td>
                        				<a href="edit_user.php?id=<?= $result['user_id'] ?>" class="btn">Edit</a>
                        			</td>
                        			<td>
                                    	<form action="" method="POST" onsubmit="return confirm('Are you sure, You want to delete?') ">
                                       		<input type="hidden" name="user_id" value="<?= $result['user_id'] ?>">
                                       		<input type="submit" name="delete_user" value="Delete"
                                          		class="btn btn-sm">
                                    	</form>
                                 	</td>
                        		</tr>

                        		<?php }
                        	}
                        	else
                        	{ ?>
                        		<tr><th>No Record Found</th></tr>
                        	<?php }
                        ?>
                    </tbody>
                </table>
                <!-- Pagination start -->
                  <?php
                     $pagination = "SELECT * FROM user";
                     $run_q = mysqli_query($config, $pagination);
                     $total_post = mysqli_num_rows($run_q);
                     $pages = ceil($total_post / $limit);
                     if ($total_post > $limit) { ?>
                        <ul class="pagination pt-2 pb-5">
                        <?php for ($i=1; $i <= $pages ; $i++) { ?>
                           <li class="page-item">
                              <a href="user.php?page=<?= $i ?>" class="page-link <?=($i == $page)? 'bg-secondary text-light':'';?>">
                                 <?= $i ?>
                              </a>
                           </li>
                        <?php } ?>
                        </ul>
                  <?php } ?>
                  <!-- ================= -->
            </div>
        </div>
    </div>
</div>
<!--=== BODY TABLE ENDS ===-->
<?php include 'footer.php'; ?>