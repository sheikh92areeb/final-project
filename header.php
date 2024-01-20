<?php
  include 'assits/connection/connect.php';
  $page = basename($_SERVER['PHP_SELF'],".php");
  session_start();
  $select = "SELECT * FROM categories";
  $query = mysqli_query($config, $select);
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!--== WEB TITLE ==-->
    <title>Ablog</title>

    <!--== FAVICON LINK ==-->
    <link rel="icon" type="image/png" href="assits/img/ablog.png">

    <!--=== FONT AWESOME LINK ===-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!--=== BOOTSTRAP LINK ===-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <!-- === CUSTOM CSS LINK === -->
    <link rel="stylesheet" type="text/css" href="assits/css/style.css">

  </head>
  <body>
    <!-- === HEADER START === -->
    <div class="ribon bg-light"></div>
    <header class="border-bottom border-top bg-white">
      <div class="container d-flex flex-wrap justify-content-between">
        <a href="/" class="link-body-emphasis text-decoration-none logo">
          <span class="">A</span>
          Blog
        </a>
        <div class="d-flex align-items-center">
          <?php
            if (isset($_SESSION['user_data'])) 
            { ?>
              <div class="dropdown text-end ms-3 mt-1">
                <a href="#" class="d-block text-decoration-none dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                <?php
                  if (isset($_SESSION['user_data'])) 
                  {
                    echo "<span class='text-secondary'>".$_SESSION['user_data'][1]."</span>";
                  }
                ?>
                  <img src="assits/img/profile.svg" alt="user" width="32" height="32" class="rounded-circle">
                </a>
                <ul class="dropdown-menu text-small">
                  <!-- <li><a class="dropdown-item" href="model.php">My Profile</a></li> -->
                  <li><a class="dropdown-item" href="admin/index.php">Dashboard</a></li>
                  <li><a class="dropdown-item" href="admin/logout.php">Log out</a></li>
                </ul>
              </div>
          <?php } 
            else
            { ?>
              <ul class="nav">
                <li class="nav-item">
                  <a href="assits/form/login-form.php" class="nav-link px-2">Login</a>
                </li>
                <li class="nav-item">
                  <a href="assits/form/signup.php" class="nav-link px-2">Sign up</a>
                </li>
              </ul>  
          <?php } ?>
        </div>
      </div>
    </header>
    <nav class="py-2 bg-body-tertiary border-bottom">
      <div class="container d-flex flex-wrap">
        <ul class="nav me-auto">
          <li class="nav-item">
            <a href="index.php" class="nav-link px-2 <?= ($page == 'index')? 'active': ''; ?>">Home</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Categories</a>
            <div class="dropdown-menu">            
              <?php while ($cats = mysqli_fetch_assoc($query)) { ?>
              <a class="dropdown-item" href="category.php?id=<?= $cats['category_id'] ?>">
              <?= $cats['category_name'] ?>
              </a>
              <?php } ?>
            </div>
          </li>
          <li class="nav-item">
            <a href="rated.php" class="nav-link px-2 <?= ($page == 'rated')? 'active': ''; ?>">Top Rated</a>
          </li>
        </ul>
        <?php
          if (isset($_GET['keyword'])) 
          {
            $keyword = $_GET['keyword'];
          }
          else
          {
            $keyword = "";
          }
        ?>
        <form class="col-12 col-lg-auto" action="search.php" method="GET">
          <div class="input-group">
            <input type="search" class="form-control" placeholder="Search" name="keyword" required maxlength="70" autocomplete="off" value="<?= $keyword ?>">
            <button class="btn btn-secondary" type="button" id="button-addon2">
              <i class="fa fa-search"></i>
            </button>
          </div>
        </form>
      </div>
    </nav>
    <!-- === HEADER ENDS === -->