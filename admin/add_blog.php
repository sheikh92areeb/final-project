<?php include 'header.php'; 
	if (isset($_SESSION['user_data'])) 
	{
		$author_id = $_SESSION['user_data']['0'];
	}

	$sql = "SELECT * FROM categories";
	$query = mysqli_query($config, $sql);

	// INSERT POST
	if (isset($_POST['add_blog'])) 
	{
		$title = mysqli_real_escape_string($config, $_POST['blog_title']);
		$body = mysqli_real_escape_string($config, $_POST['blog_body']);
		$filename = $_FILES['blog_img']['name'];
		$tmp_name = $_FILES['blog_img']['tmp_name'];
		$size = $_FILES['blog_img']['size'];
		$img_ext = strtolower(pathinfo($filename,PATHINFO_EXTENSION));
		$allow_type = ['jpg', 'png', 'jpeg'];
		$destination = "assits/img/post/".$filename;
		$category = mysqli_real_escape_string($config, $_POST['category']);
		if (in_array($img_ext, $allow_type)) 
		{
			if ( $size <= 2000000 ) 
			{
				move_uploaded_file($tmp_name, $destination);
				$sql2 = "INSERT INTO blog (blog_title, blog_body, blog_img, category, author_id) VALUES ('$title','$body','$filename','$category','$author_id')";
				$query2 = mysqli_query($config, $sql2);
				if ($query2) 
				{
					$msg = ['Post published successfully','alert-success'];
					$_SESSION['msg']=$msg;
					header("location:blog.php");
				}
				else
				{
					$msg = ['Failed, Please try again','alert-danger'];
					$_SESSION['msg']=$msg;
					header("location:add_blog.php");
				}
			}
			else
			{
				$msg = ['Image size should not be greater than 2mb','alert-danger'];
				$_SESSION['msg']=$msg;
				header("location:add_blog.php");
			}
		}
		else
		{
			$msg = ['File type is not allowed (only jpg, png and jpeg)','alert-danger'];
			$_SESSION['msg']=$msg;
			header("location:add_blog.php");
		}
	}
	// ============
?>
<div class="container-fluid" id="adminpage">
	<h5 class="mb-2 text-gray-800">Blogs</h5>
	<div class="row">
		<div class="col-xl-8 col-lg-6">
			<div class="card">
				<div class="card-header">
					<h6 class="font-weight-bold text-secondary mt-2">Publish Blog/Article</h6>
				</div>
				<div class="card-body">
					<form action="" method="POST" enctype="multipart/form-data">
						<div class="mb-3">
							<input type="text" name="blog_title" placeholder="Title" class="form-control" required>
						</div>
						<div class="mb-3">
							<label>Body/Description</label>
							<textarea class="form-control" name="blog_body" rows="2" id="blog" required></textarea>
						</div>
						<div class="mb-3">
							<input type="file" name="blog_img" class="form-control" required>
						</div>
						<div class="mb-3">
							<select class="form-control" required name="category">
								<option>Select Category</option>
								<?php  while ($cats = mysqli_fetch_assoc($query)) { ?>
									<option value="<?= $cats['category_id'] ?>">
										<?= $cats['category_name'] ?>
									</option>
								<?php } ?>
							</select>
						</div>
						<div class="mb-3">
							<input type="submit" name="add_blog" value="Add" class="btn btn-secondary">
							<a href="blog.php" class="btn btn-danger">Back</a>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>

<?php include 'footer.php'; 
	
?>