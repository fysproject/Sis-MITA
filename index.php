<?php 
session_start();
error_reporting(0);
include "config/koneksi.php"; 
include "config/fungsi_indotgl.php"; 
include "config/library.php"; 
include "config/class_paging.php"; 
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="icon.png">
    <title>Sis-MITA</title>
    <link href="asset/css/bootstrap.min.css" rel="stylesheet">
    <link href="asset/css/style.css" rel="stylesheet">
    <link href="asset/css/datepicker.css" rel="stylesheet">
    <script src="asset/js/jquery.js"></script>
    <script type="text/javascript">
      $(document).on("click", ".open-AddBookDialog", function () {
           var myBookId = $(this).data('id');
           var myBookId1 = $(this).data('id1');
           var myBookId2 = $(this).data('id2');
           var myBookId3 = $(this).data('id3');
           var myBookId4 = $(this).data('id4');
           var myBookId5 = $(this).data('id5');
           var myBookId6 = $(this).data('id6');
           $(".modal-body #bookId").val( myBookId );
           $(".modal-body #bookId1").val( myBookId1 );
           $(".modal-body #bookId2").val( myBookId2 );
           $(".modal-body #bookId3").val( myBookId3 );
           $(".modal-body #bookId4").val( myBookId4 );
           $(".modal-body #bookId5").val( myBookId5 );
           $(".modal-body #bookId6").val( myBookId6 );
      });
    </script>
  </head>

<body>
  <div class="container">
    <?php 
      if (isset($_SESSION[admin])){  
        echo "<img style='width:100%; margin-top:20px' src='asset/images/header1.png' />
              <nav class='navbar navbar-inverse'>";
      }else{
        echo "<img style='width:100%; margin-top:20px' src='asset/images/header1.png' />
              <nav class='navbar navbar-inverse'>";
      }
    ?>
      
        <div class="container-fluid">
          <div class="navbar-header>
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
          </div>

          <div id="navbar" class="navbar-collapse collapse">
            <?php 
            if (isset($_SESSION[admin])){ 
              include "admin/menu_admin.php";
            }else{ 
              include "menu.php"; 
            } ?>
          </div><!--/.nav-collapse -->
        </div><!--/.container-fluid -->
      </nav>

  <div class="post text">
    	<?php include "content.php"; ?>
      <?php include "modal.php"; ?>
    </div>
</div> <!-- /container -->
<?php if (isset($_SESSION[admin])){  ?>
  <footer style="background:#0000CD; border-top:3px solid #778899; padding:15px">
          <div class="container">
              <div class="row">
                     <strong><p class="footer" style="text-align:center; color:#FFF">
                        Copyright © 2019 Sistem Informasi Penjaminan Mutu Penelitian (Sis-Mita)<br>
                        BBPSDMP Kominfo Medan
                      </p></strong>
              </div>
          </div>
  </footer>
<?php }else{ ?>
  <footer style="background:#0000CD; border-top:3px solid #778899; padding:15px">
          <div class="container">
              <div class="row">
                      <strong><p class="footer" style="text-align:center; color:#FFF">
                        Copyright © 2019 Sistem Informasi Penjaminan Mutu Penelitian (Sis-Mita)<br>
                        BBPSDMP Kominfo Medan
                      </p></strong>
              </div>
          </div>
  </footer>
<?php } ?>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="asset/js/prettify.js"></script>

    <script src="asset/js/bootstrap.min.js"></script>
    <script src="asset/js/bootstrap-datepicker.js"></script>
    <script type="text/javascript">
        // When the document is ready
        $(document).ready(function () {
          $('#datepicker1').datepicker({
              format: "dd-mm-yyyy"
          });  
        });

        $(document).ready(function () {
          $('#datepicker2').datepicker({
              format: "dd-mm-yyyy"
          });  
        });

        $(document).ready(function () {
          $('#datepicker3').datepicker({
              format: "dd-mm-yyyy"
          });  
        });

        $(document).ready(function () {
          $('#datepicker4').datepicker({
              format: "dd-mm-yyyy"
          });  
        });

        $(document).ready(function () {
          $('#datepicker5').datepicker({
              format: "dd-mm-yyyy"
          });  
        });

        $(document).ready(function () {
          $('#datepicker6').datepicker({
              format: "dd-mm-yyyy"
          });  
        });

        $(document).ready(function () {
          $('#datepicker7').datepicker({
              format: "dd-mm-yyyy"
          });  
        });

        $(document).ready(function () {
          $('#datepicker8').datepicker({
              format: "dd-mm-yyyy"
          });  
        });

        $(document).ready(function () {
          $('#datepicker2').datepicker({
              viewMode: 'years',
              format: "mm-yyyy"
          });  
        });
      </script>

  </body>
</html>
