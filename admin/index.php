<?php include 'header.php';?>
<!--=== BODY TABLE START ===-->
      <div class="container-fluid" id="adminpage">
         <h5>Admin Dashboard</h5>
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
               <div class="row">
                  <div class="col-lg-4">
                     <div class="container">                                             
                        <?php
                           if (isset($_SESSION['user_data'])) 
                           {
                              $user_id = $_SESSION['user_data']['0'];
                           }
                           $u_post = "SELECT * FROM blog WHERE author_id = '$user_id'";
                           $query = mysqli_query($config, $u_post);
                           $rows = mysqli_num_rows($query);
                        ?>
                        <div class="card text-secondary bg-outline-secondary mb-3 shadow" style="width: 20rem;">
                           <div class="card-header" style="color: var(--skin-color);">My Posts</div>
                           <div class="card-body">
                              <h5 class="card-title">My All Posts</h5>
                              <hr>
                              <h2><?= $rows ?> : Posts</h2>
                           </div>
                        </div>
                     </div>
                  </div>
                  <?php
                     if (isset($_SESSION['user_data'])) 
                     {
                        $admin = $_SESSION['user_data']['3'];
                     }
                     if ($admin == 1) {
                  ?>
                  <div class="col-lg-4">
                     <div class="container">
                        <?php
                           $sql = "SELECT * FROM blog";
                           $query = mysqli_query($config, $sql);
                           $rows = mysqli_num_rows($query);
                        ?>
                        <div class="card text-secondary bg-outline-secondary mb-3 shadow" style="width: 20rem;">
                           <div class="card-header" style="color: var(--skin-color);">All Posts</div>
                           <div class="card-body">
                              <h5 class="card-title">Total no of Posts</h5>
                              <hr>
                              <h2><?= $rows ?> : Posts</h2>
                           </div>
                        </div>
                     </div>
                     <div class="container">
                        <?php
                           $sql = "SELECT * FROM categories";
                           $query = mysqli_query($config, $sql);
                           $rows = mysqli_num_rows($query);
                        ?> 
                        <div class="card text-secondary bg-outline-secondary mb-3 shadow" style="width: 20rem;">
                           <div class="card-header" style="color: var(--skin-color);">All Categories</div>
                           <div class="card-body">
                              <h5 class="card-title">Total no of Categories</h5>
                              <hr>
                              <h2><?= $rows ?> : Categories</h2>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="col-lg-4">
                     <div class="container">
                        <?php
                           $role = 0;
                           $sql = "SELECT * FROM user WHERE role = '$role'";
                           $query = mysqli_query($config, $sql);
                           $rows = mysqli_num_rows($query);
                        ?>
                        <div class="card text-secondary bg-outline-secondary mb-3 shadow" style="width: 20rem;">
                           <div class="card-header" style="color: var(--skin-color);">All Users</div>
                           <div class="card-body">
                              <h5 class="card-title">Total no of User</h5>
                              <hr>
                              <h2><?= $rows ?> : Users</h2>
                           </div>
                        </div>
                     </div>
                     <div class="container">
                        <?php
                           $role = 1;
                           $sql = "SELECT * FROM user WHERE role = '$role'";
                           $query = mysqli_query($config, $sql);
                           $rows = mysqli_num_rows($query);
                        ?>
                        <div class="card text-secondary bg-outline-secondary mb-3 shadow" style="width: 20rem;">
                           <div class="card-header" style="color: var(--skin-color);">All Admins</div> 
                           <div class="card-body">
                              <h5 class="card-title">Total no of Admins</h5>
                              <hr>
                              <h2><?= $rows ?> : Admins</h2>
                           </div>
                        </div>
                     </div>
                  </div>
                  <?php } ?>
               </div>
            </div>
         </div>
      </div>
      <!--=== BODY TABLE ENDS ===-->
<?php include 'footer.php';?>