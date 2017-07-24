<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>kas apps</title>
    <meta content="width=device-width,initial-scale=1.0,user-scalable=no,minimum-scale=1.0,maximum-scale=1.0" name="viewport"/>
    <meta name="author" content="Abas | Xavier"/>

    <!-- css load source -->
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/jquery.dataTables.min.css">

    <!-- js load source -->
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.min.js"></script>
    <script src="js/jquery-1.12.4"></script>
    <script src="js/jquery.dataTables.min.js"></script>

  </head>
  <body>
    <div class="container">
      <h2>Kas Apps</h2>
      <p>with <b>Query</b> loaded</p>

      <p>
        <a href="#" class="btn btn-info" data-target="#KasAdd" data-toggle="modal">Add</a>
      </p>

      <table id="dataTabel" class="display table table-bordered">
        <thead>
          <th>No</th>
          <th>Nama</th>
          <th>Nim</th>
          <th>Total</th>
          <th>Action</th>
        </thead>

        <?php
          include 'koneksi.php';
          $no = 0;
          $kas = mysqli_query($koneksi,"SELECT * FROM kas");
          while ($r=mysqli_fetch_array($kas)) {
            $no++;
        ?>

         <tr>
           <td><?php echo $no; ?></td>
           <td><?php echo $r['name']; ?></td>
           <td><?php echo $r['nim']; ?></td>
           <td><?php echo $r['total_kas']; ?></td>
           <td>
             <a href="#" class="open_modal" id="<?php echo $r['id'];?>">Edit</a>
             <a href="#" onclick="confirm_modal('p_delete.php?&id=<?php echo $r['id'];?>');">Delete</a>
             <a href="#" class="add_modal" id="<?php echo $r['id'];?>">Tambah</a>
           </td>
         </tr>
         <?php } ?>
      </table>
    </div>

    <div class="modal fade" id="KasAdd" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
            <h4 class="modal-title" id="myModalLabel">Add Kas</h4>
          </div>
          <div class="modal-body">
            <form action="p_save.php" name="modal_popup" enctype="multipart/form-data" method="post">
              <div class="form-group" style="padding-bottom:20px;">
                <label for="name">Name</label>
                <input type="text" name="name" class="form-control" placeholder="name" required>
              </div>
              <div class="form-group" style="padding-bottom:20px;">
                <label for="nim">Nim</label>
                <input type="text" name="nim" class="form-control" placeholder="nim" required>
              </div>
              <div class="form-group" style="padding-bottom:20px">
                <label for="kas">Kas</label>
                <input type="number" name="total_kas" class="form-control" placeholder="bayar kas" required>
              </div>
              <div class="modal-footer">
                <button type="submit" class="btn btn-success">Add</button>
                <button type="reset" class="btn btn-warning" data-dismiss="modal" aria-hidden="true">Cancel</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>

    <div class="modal fade" id="KasEdit" tabindex="-1" role="dailog" aria-labelledby="myModalLabel" aria-hidden="true">

    </div>

    <div class="modal fade" id="delete">
      <div class="modal-dialog">
        <div class="modal-content" style="margin-top:100px">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title" style="text-align:center">Serius ingin di Delete!?</h4>
          </div>
          <div class="modal-footer" style="margin:0px; border-top:0px; text-align:center;">
            <a href="#" class="btn btn-danger" id="delete_link">Delete</a>
            <button type="button" class="btn btn-success" data-dismiss="modal" >Cancel</button>
          </div>
        </div>
      </div>
    </div>

    <div class="modal fade" id="KasTambah" tabindex="-1" role="dailog" aria-labelledby="myModalLabel" aria-hidden="true">

    </div>
    <!-- type script -->
    <script type="text/javascript">
      $(document).ready(function() {
          $('#dataTabel').DataTable();
      } );

      $(document).ready(function () {
      $(".open_modal").click(function(e) {
         var m = $(this).attr("id");
         $.ajax({
               url: "edit.php",
               type: "GET",
               data : {id: m,},
               success: function (ajaxData){
                 $("#KasEdit").html(ajaxData);
                 $("#KasEdit").modal('show',{backdrop: 'true'});
               }
             });
           });
         });

      $(document).ready(function () {
      $(".add_modal").click(function(e) {
         var m = $(this).attr("id");
         $.ajax({
               url: "tambah.php",
               type: "GET",
               data : {id: m,},
               success: function (ajaxData){
                 $("#KasTambah").html(ajaxData);
                 $("#KasTambah").modal('show',{backdrop: 'true'});
               }
             });
           });
         });

      function confirm_modal(delete_url){
        $('#delete').modal('show',{backdrop:'static'});
        document.getElementById('delete_link').setAttribute('href',delete_url);
      }
    </script>
  </body>
</html>
