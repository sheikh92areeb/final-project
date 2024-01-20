<?php 
   ob_start();
   define('blog', true);
   $page = basename($_SERVER['PHP_SELF'],".php");
   $active = "background-color: var(--bg-black-100); color: var(--text-black-700);";
   include '../assits/connection/connect.php'; 
   session_start(); 
   if (!isset($_SESSION['user_data'])) 
   {
      header("location: ../assits/form/login-form.php");
   }
?>
<!doctype html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">

      <!--== WEB TITLE ==-->
      <title>Ablog_Admin Dashboard</title>

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
      <!--=== HEADER START ===-->
      <div class="d-flex">
         <!--=== SIDEBAR START ===-->
         <div class="d-flex flex-column flex-shrink-0 bg-dark p-3 sd_bar">
            <a href="/" class="link-body-emphasis text-decoration-none logo">
               <span class="">A</span>
               Blog
            </a>
            <ul class="nav nav-pills flex-column mb-auto">
               <li class="nav-item">
                  <a href="index.php" class="nav-link" style="<?= ($page == 'index')? $active: ''; ?>">Dashboard</a>
               </li>
               <li>
                  <a href="blog.php" class="nav-link" style="<?= ($page == 'blog')? $active: ''; ?>">Blogs</a>
               </li>
               <?php
                  if (isset($_SESSION['user_data'])) 
                  {
                     $admin = $_SESSION['user_data']['3'];
                  }
                  if ($admin == 1) {
                  ?>
               <li>
                  <a href="categories.php" class="nav-link" style="<?= ($page == 'categories')? $active: ''; ?>">Categories</a>
               </li>
               <li>
                  <a href="user.php" class="nav-link" style="<?= ($page == 'user')? $active: ''; ?>">User</a>
               </li>
               <?php } ?>
            </ul>
         </div>
         <!--=== SIDEBAR ENDS ===-->
         <!--=== TOPBAR START ===-->
         <header class="border-bottom shadow" id="adminpage" style="padding-top: 0;">
            <div class="container-fluid d-flex justify-content-between px-5">
               <div>&nbsp;</div>
               <div class="dropdown img-down">
                  <a href="#" class="d-block text-decoration-none dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                     <?php
                        if (isset($_SESSION['user_data'])) 
                        {
                           echo "<span class='text-secondary'>".$_SESSION['user_data'][1]."</span>";
                        }
                     ?>
                     <img src="assits/img/user/profile.svg" alt="user" width="32" height="32" class="rounded-circle">
                  </a>
                  <ul class="dropdown-menu text-small">
                     <li><a class="dropdown-item" href="../index.php">Profile</a></li>
                     <li><a class="dropdown-item" href="logout.php">Log out</a></li>
                  </ul>
               </div>
            </div>
         </header>
         <!--=== TOPBAR ENDS ===-->
      </div>
      <?php
            if (isset($_SESSION['msg'])) 
            {
               $message = $_SESSION['msg']['0'];
               $bs_class = $_SESSION['msg']['1'];
            ?>
            <div class="container-fluid" id="adminpage" style="padding-top: 0;">
               <div class="mt-2 alert alert-dismissible <?= $bs_class ?>">
                  <?= $message ?>
                  <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
               </div>
            </div>               
            <?php
               unset($_SESSION['msg']);
            }  ?>
      <!--=== HEADER ENDS ===-->