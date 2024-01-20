<?php
	include 'header.php';
	$id = $_GET['id'];
	if (empty($id)) 
	{
		header("location:index.php");
	}
  	$sql = "SELECT * FROM blog LEFT JOIN Categories ON blog.category=categories.category_id LEFT JOIN user ON blog.author_id=user.user_id WHERE category_id = '$id' ORDER BY blog.publish_date DESC";
  	$run = mysqli_query($config,$sql);
  	$rows = mysqli_num_rows($run);

?>
<!-- === BLOG CONTAINER & SIDEBAR START === -->
    <div class="container my-4 p-0">
      <div class="d-flex justify-content-between">
        <div class="bg-light px-3 py-3 shadow" style="width: 745px;">
          <div class="con-ribon bg-danger mb-4">All Blogs</div>
          <?php
            if ($rows) 
            {
              while ($result = mysqli_fetch_assoc($run)) {
          ?>
          <div class="shadow p-3 mb-3 rounded d-flex" id="border">
            <div>
              <a href="single_post.php?id=<?= $result['blog_id'] ?>">
                <?php $img = $result['blog_img'] ?>
                <img src="admin/assits/img/post/<?= $img ?>" width="200px" height="200px">
              </a>
            </div>
            <div class="cd_body">
              <a href="single_post.php?id=<?= $result['blog_id'] ?>" class="b_title text-decoration-none">
                <h4><?= $result['blog_title'] ?></h4>
              </a>
              <p class="mb-2">
                <a href="single_post.php?id=<?= $result['blog_id'] ?>" class="text-decoration-none pb-3">
                  <?= strip_tags(substr($result['blog_body'], 0,150))."..." ?>
                </a>
              </p>
              <a href="single_post.php?id=<?= $result['blog_id'] ?>" class="text-decoration-none" id="btn">Continue Reading</a>
              <ul>
                <li class="me-3">
                  <a href="single_post.php?id=<?= $result['blog_id'] ?>" class="text-decoration-none">
                    <span><i class="fa fa-pencil-square-o"></i></span>
                    <?= $result['username'] ?>
                  </a>  
                </li>
                <li class="me-3">
                  <a href="single_post.php?id=<?= $result['blog_id'] ?>" class="text-decoration-none">
                    <span><i class="fa fa-calendar-o"></i></span>
                    <?= date('d/M/Y',strtotime($result['publish_date'])) ?>
                  </a>
                </li>
                <li>
                  <a href="single_post.php?id=<?= $result['blog_id'] ?>" class="text-decoration-none">
                    <span><i class="fa fa-tag"></i></span>
                    <?= $result['category_name'] ?>
                  </a>
                </li>
              </ul>                
            </div>
          </div>
          <?php } } ?>
        </div>
        <?php include 'sidebar.php'; ?>
      </div>
    </div>
    <!-- === BLOG CONTAINER & SIDEBAR ENDS === -->
<?php include 'footer.php'; ?>    