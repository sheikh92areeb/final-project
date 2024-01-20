<?php include 'header.php';
   $id = $_GET['id'];
   if (empty($id)) 
   {
      header("location:categories.php");
   }
   $sql = "SELECT * FROM categories WHERE category_id = '$id'";
   $query = mysqli_query($config, $sql);
   $row = mysqli_fetch_assoc($query);

   if (isset($_POST['edit_cat'])) 
   {
      $cat_name = mysqli_real_escape_string($config, $_POST['cat_name']);
      $sql2 = "UPDATE categories SET category_name = '{$cat_name}' WHERE category_id='{$id}'";
      $update = mysqli_query($config, $sql2);
      if ($update) 
      {
         $msg = ['Category has been Updated Successfully', 'alert-success'];
         $_SESSION['msg']=$msg;
         header("location:categories.php");
      }
      else
      {
         $msg = ['Failed, Please try again', 'alert-danger'];
         $_SESSION['msg']=$msg;
         header("location:categories.php");
      }  
   }   
 ?>
<div class="container-fluid" id="adminpage">
   <h5 class="mb-2 text-gray-800">Categories</h5>
   <div class="row">
      <div class="col-xl-6 col-lg-5">
         <div class="card">
            <div class="card-header">
               <h6 class="font-weight-bold text-secondary mt-2">Edit Category</h6>
            </div>
            <div class="card-body">
               <form action="" method="POST">
                  <div class="mb-3">
                     <input type="text" name="cat_name" placeholder="Category Name" class="form-control" required value="<?= $row['category_name'] ?>">
                  </div>
                  <div class="mb-3">
                     <input type="submit" name="edit_cat" value="Edit" class="btn btn-secondary">
                     <a href="categories.php" class="btn btn-danger">Back</a>
                  </div>
               </form>
            </div>
         </div>
         </div>
   </div>
</div>
<?php include 'footer.php'; 
   
?>
