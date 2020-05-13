<!DOCTYPE html>
<html>
  <?php $this->load->view('admin/head') ?>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <?php $this->load->view('admin/header') ?>
  <!-- Left side column. contains the logo and sidebar -->
  <?php $this->load->view('admin/leftbar') ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
    <center>
    <h1>Banner Display in Android</h1>
    </center>
    <br>
    <?php if($this->session->flashdata('display') == TRUE):?>
	<div class="alert alert-success alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
   <span aria-hidden="true">&times;</span>
  </button>
  <strong>Succsess !</strong> Display product In order
</div> 
<?php endif; ?>

<?php if($this->session->flashdata('not_display') == TRUE):?>
	<div class="alert alert-success alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
   <span aria-hidden="true">&times;</span>
  </button>
  <strong>Succsess !</strong> Not Display product In order
</div> 
<?php endif; ?>
        
<?php if($this->session->flashdata('delete') == TRUE):?>
	<div class="alert alert-success alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
   <span aria-hidden="true">&times;</span>
  </button>
  <strong>Succsess !</strong> Delete product
</div> 
<?php endif; ?>
<?php if($this->session->flashdata('edit') == TRUE):?>
	<div class="alert alert-success alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
   <span aria-hidden="true">&times;</span>
  </button>
  <strong>Succsess !</strong> Banner Changed
</div> 
<?php endif; ?>
  </section>

</form>
	
	
	<br>
    <div class="col-md-12">
    <div class="box box-primary">
    <div class="box-header with-border">


    </div>
    
    <div class="box-body">
    <table class="table table-striped table-bordered data">
    <thead>
	
<tr>
	<th width="1%">NO.</th>
    <th><i class="fa fa-image"></i> Preview</th>
  <th><i class="fa fa-gears"></i> Action</th>

 
  
</tr>
</thead>
<?php 
                  $no=0;
                    foreach ($get_banner->result_array() as $sws):
                        $no++;
                        $id=$sws['id'];
                        $picture=$sws['image_url'];
                ?>
<tr>
	<td><?php echo $no;?></td>
  <td><a href="<?php echo base_url('assets/images/banner/').$picture ?>"> <img src="<?php echo base_url('assets/images/banner/').$picture ?>" alt="<?php echo $picture;?>" height="100px"></a> </td>
    <td><center><a class="btn btn-sm btn-warning" href="#edit<?php echo $id?>" data-toggle="modal" title="Edit"><span class="fa fa-pencil"></span> EDIT </a>
    </td>
	</center>
	
		
</tr>
<?php endforeach; ?>
  </table>



</div>
  </div>
  </div>
</div>


<?php 
                 
                    foreach ($get_banner->result_array() as $sws){
                  
                        $id=$sws['id'];
                        $picture=$sws['image_url'];
						
                ?>

<div class="modal fade" id="edit<?php echo $id;?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title" id="exampleModalLabel"><i class="fa fa-pencil"></i> Change Picture</h1>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="post"  enctype="multipart/form-data" action="<?php echo base_url().'report/change_banner'; ?>">
      <div class="modal-body">
      
    
		<div class="form-group">
        <input type="hidden" name="id" value="<?php echo $id;?>">
        <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Picture</label>
                    <div class="col-sm-10">
                      <div class="input-group">
                      <input type="file" name="picture" class="form-control" required>
                        <div class="input-group-addon">
                          <i class="fa fa-image"></i>
                        </div>
                      </div>
                    </div>
                  </div>
                  <br>


      </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
        <button type="submit" class="btn btn-primary">Change</button>
      
                    </form></div>
    </div>
  </div>
</div>
                    <?php } ?>


<!-- Modal Edit Pelanggan -->

<footer class="main-footer">
  <div class="pull-right hidden-xs">
    <b>Version</b> Prototype
  </div>
  <strong>Copyright &copy; 2019 <a href="https://adminlte.io">Exitus</a>.</strong> All rights
  reserved.
</footer>
<script type="text/javascript">
	$(document).ready(function(){
		$('.data').DataTable();
	});
</script>
<div class="control-sidebar-bg"></div>
</div>
<script src="<?php echo base_url('assets/template/back/bower_components') ?>/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="<?php echo base_url('assets/template/back/bower_components') ?>/fastclick/lib/fastclick.js"></script>
<script src="<?php echo base_url('assets/template/back/dist') ?>/js/adminlte.min.js"></script>
</body>

</html>
