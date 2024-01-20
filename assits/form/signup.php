<?php include 'header.php'; 
   if (isset($_POST['signup'])) 
   {
      $username = mysqli_real_escape_string($config,$_POST['username']);
      $email = mysqli_real_escape_string($config,$_POST['email']);
      $pass = mysqli_real_escape_string($config,sha1($_POST['pass']));
      $c_pass = mysqli_real_escape_string($config,sha1($_POST['c_pass']));

      if (strlen($username) < 4 || strlen($username) > 100) 
      {
         $error = "username must be between 4 to 100 char";
      }
      elseif (strlen($pass) < 4) 
      {
         $error = "password must be 4 char long";
      }
      elseif($pass != $c_pass)
      {
         $error = "password dose not match";
      }
      else
      {
         $sql = "SELECT * FROM user WHERE email = '$email'";
         $query = mysqli_query($config, $sql) ;
         $row = mysqli_num_rows($query);
         if ($row >= 1) 
         {
            $error = "Email Already Exist";
         }
         else
         {
            $sql2 = "INSERT INTO user (username, email, password) VALUES ('$username','$email','$pass')";
            $query2 = mysqli_query($config, $sql2);
            if ($query2) 
            {
               $msg = ['User has been Added Successfully', 'alert-success'];
               $_SESSION['msg']=$msg;
               header("location:../../admin/user.php");
            }
            else
            {
               $error = "Failed, Please try again";
            }
            // echo "User added successfully";
         }
      }
   }
?>
      <main class="form-signin col-6 m-auto text-center py-3 my-3 bg-light rounded shadow">
         <?php
            if (!empty($error)) 
            {
               echo "<p class='bg-danger p-2 text-light'>".$error."</p>";
            }
         ?>
         <form class="col-10 m-auto" method="POST">
            <a href="/" class="text-decoration-none logo">
               <span class="">A</span>
               Blog
            </a>
            <hr class="py-1">
            <h1 class="h3 mb-4 fw-normal">Please Sign up</h1>
            <div class="d-flex justify-content-between">
               <div class="form-floating col-6">
                  <input type="text" class="form-control mb-2" id="floatingInput" placeholder="Username" required style="width: 90%;" name="username" value="<?= (!empty($error))? $username:'' ?>">
                  <label for="floatingInput">Username</label>
               </div>
               <div class="form-floating col-6">
                  <input type="email" class="form-control mb-2" id="floatingInput" placeholder="name@example.com" required style="width: 90%; margin-left: 10%;" name="email" value="<?= (!empty($error))? $email:'' ?>">
                  <label for="floatingInput" style="margin-left: 10%;">Email address</label>
               </div>   
            </div>
            <div class="form-floating">
               <input type="password" class="form-control mb-2" id="floatingPassword" placeholder="Password" required name="pass">
               <label for="floatingPassword">Password</label>
            </div>
            <div class="form-floating">
               <input type="password" class="form-control" id="floatingPassword" placeholder=" Confirm Password" required name="c_pass">
               <label for="floatingPassword">Confirm Password</label>
            </div>
            <button class="w-100 mt-5 btn btn-lg btn-secondary" type="submit" name="signup">Sign up</button>
            <p class="mt-5 mb-3 text-body-secondary">&copy; <a href="">Ablog</a></p>
         </form>
      </main>
      <?php include 'footer.php'; ?>