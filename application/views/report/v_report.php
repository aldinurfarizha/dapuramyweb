<!DOCTYPE html>
<html>
  <?php $this->load->view('admin/head') ?>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
<style>
.datepicker{
  cursor:pointer
}
</style>
  <?php $this->load->view('admin/header') ?>
  <!-- Left side column. contains the logo and sidebar -->
  <?php $this->load->view('admin/leftbar') ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
    <!-- Search --> 
    <center>
    <h1>Monthly Report</h1>
    </center>
    <br>
    <br>
    <br>
<div class="align-center">
<div class="col-md-5">
    
    <div class="form-group">
    <form action="<?=site_url('report/print_report')?>" method="post">
   <label>Month</label>
       
       <select class="form-control" name="month" id="month">
       <option value="1">January</option>
       <option value="2">February</option>
       <option value="3">March</option>
       <option value="4">April</option>
       <option value="5">May</option>
       <option value="6">June</option>
       <option value="7">July</option>
       <option value="8">Agustus</option>
       <option value="9">September</option>
       <option value="10">Oktober</option>
       <option value="11">November</option>
       <option value="12">December</option>
       </select>
       </div>
  <div class="form-group">
   <label>Year</label>
       <input  type="text" class="form-control" name="year" value="2020">
       <br>
			<input type="submit" class="btn btn-success" value="Print">
     
		</form>
    </div>
    </div>
  
   <br>
 

  <!-- Akhir Search --> 
    
  </section>

		
	




  </div>
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
<script type="text/javascript">
 $(function(){
  $(".datepicker").datepicker({
      format: 'yyyy-mm-dd',
      autoclose: true,
      todayHighlight: true,
      minDate: 0,
  });
 });
</script>
</body>

</html>