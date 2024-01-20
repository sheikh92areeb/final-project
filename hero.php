<?php
   $sql = "SELECT * FROM blog LEFT JOIN Categories ON blog.category=Categories.Category_id LEFT JOIN user ON blog.author_id=user.user_id ORDER BY blog.publish_date DESC";
  $run = mysqli_query($config,$sql);
  $rows = mysqli_num_rows($run);
?>
<!-- === HERO CONTAINER START === -->
    <div class="container my-3 p-3 bg-light shadow">
      <div class="row">
        <div class="col-lg-8 px-2">
          <div class="hero">
            <a href="">
              <?php 
                if ($rows) 
                {
                  $row = mysqli_fetch_assoc($run); 
              ?>
              <?php $img = $row['blog_img'] ?>
              <img src="admin/assits/img/post/<?= $img ?>" width="735px" height="430px" class="rounded">
              <div class="hero_cont">
                <h4>
                  <a href="" class="text-decoration-none"><?= $row['blog_title'] ?></a>
                </h4>
                <span><a href="" class="text-decoration-none">Read More</a></span>
                <ul>
                  <li>
                    <a href="" class="text-decoration-none">
                      <span><i class="fa fa-pencil-square-o"></i></span>
                      <?= $row['username'] ?>
                    </a>  
                  </li>
                  <li>
                    <a href="" class="text-decoration-none">
                      <span><i class="fa fa-calendar-o"></i></span>
                      <?= date('d/M/Y',strtotime($row['publish_date'])) ?>
                    </a>
                  </li>
                  <li>
                    <a href="" class="text-decoration-none">
                      <span><i class="fa fa-tag"></i></span>
                      <?= $row['category_name'] ?>
                    </a>
                  </li>
                </ul>                
              </div>
            </a>
          </div>
        </div>
        <?php } ?>
        <div class="col-lg-4 px-2">
          <div class="s_hero">
            <a href="">
              <?php 
                if ($rows) 
                {
                  $row = mysqli_fetch_assoc($run); 
              ?>
              <?php $img = $row['blog_img'] ?>
              <img src="admin/assits/img/post/<?= $img ?>" width="355px" height="205px" class="mb-2 rounded">
              <div class="s_hero_cont">
                <h4>
                  <a href="" class="text-decoration-none"><?= $row['blog_title'] ?></a>
                </h4>
                <span><a href="" class="text-decoration-none">Read More</a></span>
                <ul>
                  <li>
                    <a href="" class="text-decoration-none">
                      <span><i class="fa fa-pencil-square-o"></i></span>
                      <?= $row['username'] ?>
                    </a>  
                  </li>
                  <li>
                    <a href="" class="text-decoration-none">
                      <span><i class="fa fa-calendar-o"></i></span>
                      <?= date('d/M/Y',strtotime($row['publish_date'])) ?>
                    </a>
                  </li>
                  <li>
                    <a href="" class="text-decoration-none">
                      <span><i class="fa fa-tag"></i></span>
                      <?= $row['category_name'] ?>
                    </a>
                  </li>
                </ul>                
              </div>
              <?php } ?>
            </a>
          </div>
          <div class="s_hero">
            <a href="">
              <?php 
                if ($rows) 
                {
                  $row = mysqli_fetch_assoc($run); 
              ?>
              <?php $img = $row['blog_img'] ?>
              <img src="admin/assits/img/post/<?= $img ?>" width="355px" height="205px" class="mb-2 rounded">
              <div class="s_hero_cont">
                <h4>
                  <a href="" class="text-decoration-none"><?= $row['blog_title'] ?></a>
                </h4>
                <span><a href="" class="text-decoration-none">Read More</a></span>
                <ul>
                  <li>
                    <a href="" class="text-decoration-none">
                      <span><i class="fa fa-pencil-square-o"></i></span>
                      <?= $row['username'] ?>
                    </a>  
                  </li>
                  <li>
                    <a href="" class="text-decoration-none">
                      <span><i class="fa fa-calendar-o"></i></span>
                      <?= date('d/M/Y',strtotime($row['publish_date'])) ?>
                    </a>
                  </li>
                  <li>
                    <a href="" class="text-decoration-none">
                      <span><i class="fa fa-tag"></i></span>
                      <?= $row['category_name'] ?>
                    </a>
                  </li>
                </ul>                
              </div>
              <?php } ?>
            </a>
          </div>
        </div>
      </div>
    </div>
    <!-- === HERO CONTAINER ENDS === -->