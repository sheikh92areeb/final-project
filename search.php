<?php
  include 'header.php';
  $keyword = $_GET['keyword'] ;
  if (empty($keyword)) 
  {
    header('location:index.php');
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
  $limit = 5;
  $offset = ($page - 1) * $limit;
  // -----------
  $sql = "SELECT * FROM blog LEFT JOIN categories ON blog.category=categories.category_id LEFT JOIN user ON blog.author_id=user.user_id WHERE blog_title like '%$keyword%' or blog_body like '%$keyword%' or category_name like '%$keyword%' or username like '%$keyword%' ORDER BY blog.publish_date DESC LIMIT $offset, $limit";
  $run = mysqli_query($config,$sql);
  $rows = mysqli_num_rows($run);

?>
<!-- === BLOG CONTAINER & SIDEBAR START === -->
    <div class="container my-4 p-0">
      <div class="d-flex justify-content-between">
        <div class="bg-light px-3 py-3 shadow b_body" style="width: 745px;">
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
          <?php } }
          else 
          {
              echo "<h5 class='text-danger'>NO Record Found!</h5> 
                    <br><br>
                    Suggestions:
                    <li>Make sure that word is spelled correctly.</li>
                    <li>Try different keywords.</li>"; 
          }
          ?>
          <!-- pagination start -->
          <?php
              $pagination = "SELECT * FROM blog WHERE blog_title like '%$keyword%' or blog_body like '%$keyword%'";
              $run_q = mysqli_query($config, $pagination);
              $total_post = mysqli_num_rows($run_q);
              $pages = ceil($total_post / $limit);
              if ($total_post > $limit) {
              ?>
                <ul class="pagination pt-2 pb-5">
                  <?php for ($i=1; $i <= $pages ; $i++) { ?>
                  <li class="page-item">
                    <a href="search.php?keyword=<?= $keyword ?>&page=<?= $i ?>" class="page-link <?=($i == $page)? "bg-secondary text-light":"";?>">
                      <?= $i ?>
                    </a>
                  </li>
                  <?php } ?>
                </ul>
        <?php } ?>
        <!-- ---------------- -->
        </div>
        <?php include 'sidebar.php'; ?>
      </div>
    </div>
    <!-- === BLOG CONTAINER & SIDEBAR ENDS === -->
    <?php include 'footer.php'; ?>