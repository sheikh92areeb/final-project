<?php
  include 'assits/connection/connect.php';
  // Recent Posts
  $select = "SELECT * FROM blog LEFT JOIN Categories ON blog.category = categories.category_id ORDER BY publish_date DESC LIMIT 4";
  $query = mysqli_query($config, $select);
?>
<div class="bg-light px-3 py-3 shadow sd_bar" style="width: 365px;">
          <div class="con-ribon bg-danger mb-4">Top Lates Blogs</div>
          <?php while($post = mysqli_fetch_assoc($query)){ ?>
          <div class="container shadow mb-3 py-2 rounded" id="border">
            <div class="d-flex justify-content-between">              
              <div class="sc_img">
                <a href="single_post.php">
                  <?php $img = $post['blog_img'] ?>
                  <img src="admin/assits/img/post/<?= $img ?>" width="80px" height="80px">
                </a>
              </div>
              <div class="sc_body">
                <a href="" class="text-decoration-none">
                  <h5><?= $post['blog_title'] ?></h5>
                </a>
                <ul>
                  <li class="me-3">
                    <a href="" class="text-decoration-none">
                      <span><i class="fa fa-calendar-o"></i></span>
                      <?= date('d/M/Y',strtotime($post['publish_date'])) ?>
                    </a>
                  </li>
                  <li>
                    <a href="" class="text-decoration-none">
                      <span><i class="fa fa-tag"></i></span>
                      <?= $post['category_name'] ?>
                    </a>
                  </li>
                </ul>
              </div>
            </div>
          </div>
          <?php } ?>
          <div class="con-ribon bg-danger mb-4 mt-5">Blog Categories</div>
          <ul>
            <?php
              $select2 = "SELECT * FROM categories";
              $query2 = mysqli_query($config, $select2) 
            ?>
            <?php while($cat = mysqli_fetch_assoc($query2)){ ?>
            <li>
              <a href="category.php?id=<?= $cat['category_id'] ?>" class="text-decoration-none"><?= $cat['category_name'] ?></a>
            </li>
            <?php } ?>
          </ul>
        </div>