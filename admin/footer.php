<?php
   if (!defined('blog')) 
   {
      header("location:index.php");
      die();
   }
?>
<!-- === FOOTER START === -->
    <div class="container" style="padding-left: 230px;">
      <footer class="d-flex flex-wrap justify-content-center align-items-center py-3 my-4 border-top border-secondary">
        <div class="col-md-4 d-flex align-items-center justify-content-center">
          <a href="/" class="mb-3 me-2 mb-md-0 text-decoration-none lh-1" style="color: var(--text-black-700);">
            ABlog
          </a>
          <span class="mb-3 mb-md-0">&copy; 2023 Company, Inc</span>
        </div>
      </footer>
    </div>
    <!-- === FOOTER ENDS === -->

    <!--=== JS LINK ===-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="http://cdn.ckeditor.com/4.17.1/standard/ckeditor.js"></script>
    <script>
      CKEDITOR.replace( 'blog' );
    </script>
  </body>
</html>