<?php 
   include '../connection/connect.php';
   include 'header.php'; 
   session_start();

   if(isset($_SESSION['user_data'])) 
   {
      header("location:../../admin/index.php");
   }
?>
    <main class="form-signin col-3 m-auto text-center py-3 my-5 bg-light rounded shadow">
         <form class="col-10 m-auto" method="POST">
            <a href="/" class="text-decoration-none logo">
               <span class="">A</span>
               Blog
            </a>
            <hr class="py-1">
            <h1 class="h3 mb-3 fw-normal">Please Log in</h1>
            <div class="form-floating">
               <input type="email" class="form-control mb-2" id="floatingInput" placeholder="name@example.com" required name="email">
               <label for="floatingInput">Email address</label>
            </div>
            <div class="form-floating">
               <input type="password" class="form-control" id="floatingPassword" placeholder="Password" required name="password">
               <label for="floatingPassword">Password</label>
            </div>
            <button class="w-100 mt-5 btn btn-lg btn-secondary" type="submit" name="login_btn">Log in</button>
            <p class="mt-5 mb-3 text-body-secondary">&copy; <a href="">Ablog</a></p>
            <?php
                  if (isset($_SESSION['error'])) 
                  {
                     $error = $_SESSION['error'];
                     echo "<p class='bg-danger p-2 text-light'>".$error."</p>";
                     unset($_SESSION['error']);
                  }

               ?>
         </form>
      </main>
<?php 
   include 'footer.php'; 
   if (isset($_POST['login_btn'])) 
   {
      $email = strip_tags(mysqli_real_escape_string($config, $_POST['email']));
      $pass = mysqli_real_escape_string($config, sha1($_POST['password']));
      $sql = "SELECT * FROM user WHERE email = '{$email}' AND password = '{$pass}'";
      $query = mysqli_query($config, $sql);
      $data = mysqli_num_rows($query);

      if ($data) 
      {
         $result = mysqli_fetch_assoc($query);
         $user_data = array($result['user_id'],$result['username'],$result['user_profile'], $result['role']);
         $_SESSION['user_data']= $user_data;
         header("location: ../../admin/index.php");
      }
      else
      {
         $_SESSION['error']= "Invail email/password";
         header("location: login-form.php");
      }
   }
?>