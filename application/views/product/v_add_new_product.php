<!DOCTYPE html>
<html>
<?php $this->load->view('admin/head') ?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
<body class="hold-transition skin-blue sidebar-mini">
  <div class="wrapper">

    <?php $this->load->view('admin/header') ?>
    <!-- Left side column. contains the logo and sidebar -->
    <?php $this->load->view('admin/leftbar') ?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
      
        
      </section>
      <br>
      <!-- Main content -->
      <br>
    <?php if($this->session->flashdata('berhasil') == TRUE):?>
	<div class="alert alert-success alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
   <span aria-hidden="true">&times;</span>
  </button>
  <strong>Succsseed !</strong> Succseed Add New Product !
</div> 
<?php endif; ?>
<br>
      <section class="content">
         
        <div class="row">
        <div class="col-md-3"></div>
          <div class="col-md-6">
            <div class="box box-info">
              <div class="box-header with-border">
                <h3 class="box-title"><i class="fa fa-spoon"></i> Add New Product</h3>
              </div>
              <form method="post" class="form-horizontal" enctype="multipart/form-data" action="<?php echo base_url().'product/save_product' ?>">
                <div class="box-body">

                  <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Product Name</label>
                    <div class="col-sm-10">
                    <div class="input-group">
                      <input type="text" class="form-control" name="product_name" placeholder="ex: Chicken Soup">
                      <div class="input-group-addon">
                          <i class="fa fa-hand-spock-o"></i>
                        </div>
                    </div>
                  </div>
</div>

<div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Description</label>
                    <div class="col-sm-10">
                    <div class="input-group">
                      <input type="text" class="form-control" name="description" placeholder="ex: chicken soup with traditional serve">
                      <div class="input-group-addon">
                          <i class="fa fa-sticky-note"></i>
                        </div>
                    </div>
                  </div>
</div>
<div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Stock</label>
                    <div class="col-sm-10">
                    <div class="input-group">
                      <input type="text" class="form-control" name="stock" placeholder="ex:80">
                      <div class="input-group-addon">
                          <i class="fa fa-dashboard"></i>
                        </div>
                    </div>
                  </div>
</div>
                  <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Price</label>
                    <div class="col-sm-10">
                    <div class="input-group">
                      <input type="text" class="form-control" name="price" placeholder="Rp...">
                      <div class="input-group-addon">
                          <i class="fa fa-money"></i>
                        </div>
                    </div>
                  </div>
</div>

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

        

                        </div>
                  <center><input type="submit" data-dismiss="modal" name="submit" id="submit"  class="btn btn-primary" value="Save" /></center>
                        </br>
                </div>
                       
              </form>
            </div>
          </div>
          <!-- Tutup Lembaran pengirim -->
          

        
        </div>
        
        
  </section>
                        
  
  
  <?php $this->load->view('admin/footer') ?>
  <!-- Button trigger modal -->


<!-- Modal -->

</body>
</html>
<script>  
 $(document).ready(function(){  
     
      $('input[type=radio][id=metode]').on('change', function() {
  switch ($(this).val()) {
    case 'credit':
      $('.transfer').remove();
      $('#pilihan_metode').append('<div class="utangpelanggan"><center><div class="col-md-12"><label for="">Keterangan : </label> <input type="text" class="form-control" name="keterangan" placeholder="Kosongkan Apabila Tidak Di perlukan"></div></div></center>');  
      break;
    case 'transfer':
      $('.utangpelanggan').remove();
      $('#pilihan_metode').append('<center><div class="transfer"><label for="">Pilih Bank : </label><select name="keterangan"><?php foreach ($bank->result_array() as $sws):?><option value="<?php echo $sws['nama_bank']." (".$sws['rekening'].") a.n ".$sws['atas_nama']; ?>"><?php echo $sws['nama_bank']." (".$sws['rekening'].") a.n ".$sws['atas_nama']; ?></option><?php endforeach;   ?></select></div></center>');
      break;
    case 'cash':
      $('.utangpelanggan').remove();
      $('.transfer').remove();
      break;
  }
});
 });  
 </script>
