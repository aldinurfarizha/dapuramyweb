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
    <h1>Vote Data</h1>
    </center>
    <br>
    <?php if($this->session->flashdata('display') == TRUE):?>
	<div class="alert alert-success alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
   <span aria-hidden="true">&times;</span>
  </button>
  <strong>Succsess !</strong> Verified This Customer !
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
  <strong>Succsess !</strong> Delete Customer !
</div> 
<?php endif; ?>
<?php if($this->session->flashdata('edit') == TRUE):?>
	<div class="alert alert-success alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
   <span aria-hidden="true">&times;</span>
  </button>
  <strong>Succsess !</strong> Edit Product
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
    <th><i class="fa fa-user-circle"></i> Customer Name</th>
	<th><i class="fa fa-address-book"></i> Product Vooted</th>
    <th><i class="fa fa-calendar"></i> Date</th>
  
 
  
</tr>
</thead>
<?php 
                  $no=0;
                    foreach ($vote->result_array() as $sws):
                        $no++;
                        $name=$sws['name'];
                        $product_name=$sws['product_name'];
                        $tgl=$sws['tgl'];
                ?>
<tr>
	<td><?php echo $no;?></td>
    <td><?php echo $name;?></td>
    <td><?php echo $product_name;?></td>
    <td><?php echo $tgl;?></td>
	
</tr>
<?php endforeach; ?>
  </table>



</div>
  </div>
  </div>
</div>
<!-- ============ MODAL PUPUS =============== -->


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
