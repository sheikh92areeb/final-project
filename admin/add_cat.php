<?php include 'header.php';
	if ($admin != 1) 
   	{
    	header("location:index.php");
   	}
	if (isset($_POST['add_cat'])) 
	{
		$cat_name = mysqli_real_escape_string($config, $_POST['cat_name']);
		$sql = "SELECT * FROM categories WHERE category_name = '{$cat_name}'";
		$query = mysqli_query($config, $sql);
		$row = mysqli_num_rows($query);

		if ($row) 
		{
			$msg = ['Category Name is Already Exist', 'alert-danger'];
			$_SESSION['msg']=$msg;
			header("location:categories.php");
		}
		else
		{
			$sql2 = "INSERT INTO categories (category_name) VALUES('$cat_name')";
			$query2 = mysqli_query($config, $sql2);
			if ($query2) 
			{
				$msg = ['Category has been Added Successfully', 'alert-success'];
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
	}
 ?>
<div class="container-fluid" id="adminpage">
	<h5 class="mb-2 text-gray-800">Categories</h5>
	<div class="row">
		<div class="col-xl-6 col-lg-5">
			<div class="card">
				<div class="card-header">
					<h6 class="font-weight-bold text-secondary mt-2">Add Category</h6>
				</div>
				<div class="card-body">
					<form action="" method="POST">
						<div class="mb-3">
							<input type="text" name="cat_name" placeholder="Category Name" class="form-control" required>
						</div>
						<div class="mb-3">
							<input type="submit" name="add_cat" value="Add" class="btn btn-secondary">
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
