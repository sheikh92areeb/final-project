<?php include 'header.php'; 
	
	$id = $_GET['id'];
	if (empty($id)) 
	{
		header("location:index.php");
	}
	$sql = "SELECT * FROM blog WHERE blog_id = '$id'";
	$run = mysqli_query($config, $sql);
	$post = mysqli_fetch_assoc($run);
?>
<div class="container mt-3">
	<div class="row">
		<div class="col-lg-8">
			<div class="card shadow">
				<div class="card-body">
					<div class="p-3 text-center">						
						<a href="admin/upload/">
							<?php $img = $post['blog_img'] ?>
							<img src="admin/assits/img/post/<?= $img ?>" width="600px" height="300px">
						</a>
					</div>
					<hr>
					<div class="ps-4" id="single">
						<h4 class="mb-3"><?= ucfirst($post['blog_title']) ?></h4>
						<p class="mb-3"><?= $post['blog_body'] ?></p>
					</div>
				</div>
			</div>
		</div>
		<?php include 'sidebar.php'; ?>
	</div>
</div>
<?php include 'footer.php'; ?>