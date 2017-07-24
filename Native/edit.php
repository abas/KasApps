<?php
include 'koneksi.php';

  $id = $_GET['id'];
  $kas = mysqli_query($koneksi,"SELECT * FROM kas WHERE id='$id'");
  while($r=mysqli_fetch_array($kas)){

?>

<div class="modal-dialog">
    <div class="modal-content">
    	<div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h4 class="modal-title" id="myModalLabel">Edit Data Kas</h4>
      </div>

      <div class="modal-body">
      	<form action="p_edit.php" name="modal_popup" enctype="multipart/form-data" method="POST">
          <div class="form-group" style="padding-bottom: 20px;">
          	<label for="Name">Name</label>
            <input type="hidden" name="id"  class="form-control" value="<?php echo $r['id']; ?>" />
				    <input type="text" name="name"  class="form-control" value="<?php echo $r['name']; ?>"/>
          </div>

          <div class="form-group" style="padding-bottom: 20px;">
          	<label for="nim">Nim</label>
				    <input type="text" name="nim" class="form-control" value="<?php echo $r['nim']; ?>"/>
          </div>

          <div class="form-group" style="padding-bottom: 20px;">
          	<label for="total_kas">Edit</label>
			      <input type="number" name="total_kas"  class="form-control" value="<?php echo $r['total_kas'];?>" />
          </div>

          <div class="modal-footer">
            <button class="btn btn-success" type="submit">Confirm</button>
            <button type="reset" class="btn btn-danger"  data-dismiss="modal" aria-hidden="true">Cancel</button>
          </div>

      	</form>

<?php } ?>

      </div>
    </div>
</div>
