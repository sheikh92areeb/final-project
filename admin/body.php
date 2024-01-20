<?php
   if (isset($_SESSION['user_data'])) 
   {
      $user_id = $_SESSION['user_data']['0'];
   }
?>
<!--=== BODY TABLE START ===-->
      <div class="container-fluid" id="adminpage">
         <h5>Blog Posts</h5>
         <div class="card shadow">
            <div class="card-header py-3 d-flex justify-content-between">
               <div>
                  <a href="" class="text-decoration-none">
                     <h6 class="font-weight-bold mt-2">Add New</h6>
                  </a>
               </div>
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
               <div class="table-responsive">
                  <table class="table table-bordered table-striped" width="100%" cellspacing="0">
                     <thead>
                        <tr class="text-center">
                           <th>Sr.No</th>
                           <th>Title</th>
                           <th>Category</th>
                           <th>Author</th>
                           <th>Date</th>
                           <th colspan="2">Action</th>
                        </tr>
                     </thead>
                     <tbody>
                        <tr class="text-center">
                           <td>1</td>
                           <td>Phone</td>
                           <td>Technology</td>
                           <td>areeb</td>
                           <td>1-1-2024</td>
                           <td>
                              <button class="btn btn-sm me-2">Edit</button>
                              <button class="btn btn-sm">Delete</button>
                           </td>
                        </tr>
                     </tbody>
                  </table>
               </div>
            </div>
         </div>
      </div>
      <!--=== BODY TABLE ENDS ===-->