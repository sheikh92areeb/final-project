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
   // DELETE QUERY
   if (isset($_POST['del_cat'])) 
   {
      $id = $_POST['cat_id'];
      $delete = "DELETE FROM categories WHERE category_id = '$id'";
      $run = mysqli_query($config, $delete);
      if ($run) 
      {
         $msg = ['Category has been Deleted Successfully', 'alert-success'];
         $_SESSION['msg']=$msg;
         header("location:Categories.php");
      }
      else
      {
         $msg = ['Failed, Please try again', 'alert-success'];
         $_SESSION['msg']=$msg;
         header("location:Categories.php");
      }
   }  
   // ================
?>
<!--=== BODY TABLE START ===-->
      <div class="container-fluid" id="adminpage">
         <h5>Categories</h5>
         <div class="card shadow">
            <div class="card-header py-3 d-flex justify-content-between">
               <div>
                  <a href="add_cat.php" class="text-decoration-none">
                     <h6 class="font-weight-bold mt-2">Add New</h6>
                  </a>
               </div>
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
                           <th>Category Name</th>                       
                           <th colspan="2">Action</th>
                        </tr>
                     </thead>
                     <tbody>
                        <?php
                           $sql = "SELECT * FROM categories LIMIT $offset, $limit";
                           $query = mysqli_query($config, $sql);
                           $rows = mysqli_num_rows($query);                           
                           if ($rows) 
                           {
                              while ($row = mysqli_fetch_assoc($query)){ ?>
                                 <tr class="text-center">
                                    <td><?= ++$offset ?></td>
                                    <td><?= $row['category_name'] ?></td>                          
                                    <td>
                                        <a href="edit_cat.php?id=<?= $row['category_id'] ?>"class="btn btn-sm btn-outline-success">Edit</a>
                                    </td>
                                    <td>
                                       <form method="POST" onsubmit="return confirm('Are you sure, You want to delete it?')">
                                          <input type="hidden" name="cat_id" value="<?= $row['category_id'] ?>">
                                          <input type="submit" name="del_cat" value="Delete" class="btn btn-sm">
                                       </form>
                                    </td>
                                 </tr>
                            <?php  }
                           }
                           else
                           { ?>
                              <tr class="text-center"><th colspan="4">No Record Found</th></tr>
                           <?php }
                           ?>
                     </tbody>
                  </table>
                   <!-- Pagination start -->
                  <?php
                     $pagination = "SELECT * FROM categories";
                     $run_q = mysqli_query($config, $pagination);
                     $total_post = mysqli_num_rows($run_q);
                     $pages = ceil($total_post / $limit);
                     if ($total_post > $limit) { ?>
                        <ul class="pagination pt-2 pb-5">
                        <?php for ($i=1; $i <= $pages ; $i++) { ?>
                           <li class="page-item">
                              <a href="categories.php?page=<?= $i ?>" class="page-link <?=($i == $page)? 'bg-secondary text-light':'';?>">
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