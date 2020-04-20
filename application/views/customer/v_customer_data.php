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
    <h1>Customer Data</h1>
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
	<th><i class="fa fa-address-book"></i> Phone Number</th>
    <th><i class="fa fa-home"></i> Address</th>
    <th><i class="fa fa-home"></i> Identity Card</th>
    <th><i class="fa fa-check"></i> Status</th>
    <th><i class="fa fa-gears"></i> Action</th>
 
  
</tr>
</thead>
<?php 
                  $no=0;
                    foreach ($customer->result_array() as $sws):
                        $no++;
                        $id_customer=$sws['id_customer'];
                        $name=$sws['name'];
                        $address=$sws['address'];
                        $status=$sws['status'];
                        $phone_number=$sws['phone_number'];
                        $card_identity=$sws['card_identity'];
                ?>
<tr>
	<td><?php echo $no;?></td>
    <td><?php echo $name;?></td>
    <td><?php echo $phone_number;?></td>
	<td><?php echo $address;?></td>
  <td><a href="<?php echo base_url('assets/images/customer/').$card_identity ?>"> <img src="<?php echo base_url('assets/images/customer/').$card_identity ?>" alt="<?php echo $card_identity;?>" height="100px"></a> </td>
  <td><?php if($status=="NOT VERIFIED"){
  
    echo '<span class="btn-sm btn-danger"><i class="fa fa-close"></i> NOT VERIFIED</span>';
  }
  else {
 
    echo '<span class="btn-sm btn-success"><i class="fa fa-check"></i> VERIFIED</span>';

  }
  ?></td>
    <td><center>
    <a class="btn btn-sm btn-danger" href="#delete<?php echo $id_customer?>" data-toggle="modal" title="Delete"><span class="fa fa-trash"></span> Delete</a>
    <?php if($status=="NOT VERIFIED"){
        echo'<a class="btn btn-sm btn-success" href="#display'.$id_customer.'" data-toggle="modal" title="Display"><span class="fa fa-eye"></span> Verified</a>';
    }
    else{
      
    }
    ?>
    </td>
	</center>
	
		
</tr>
<?php endforeach; ?>
  </table>



</div>
  </div>
  </div>
</div>
<!-- ============ MODAL PUPUS =============== -->
<?php 
                  
                  foreach ($customer->result_array() as $sws){
                      
                
                    $id_customer=$sws['id_customer'];
                    $name=$sws['name'];
                    $address=$sws['address'];
                    $status=$sws['status'];
                    $phone_number=$sws['phone_number'];
                    $card_identity=$sws['card_identity'];
              ?>
               <div id="display<?php echo $id_customer?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
                    <div class="modal-dialog">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h3 class="modal-title" id="myModalLabel"><i class="fa fa-check"></i>Are You sure to Verified this Account ?</h3>
                    </div>
                    <form class="form-horizontal" method="post" action="<?php echo base_url().'customer/verified_customer'?>">
                        <div class="modal-body">
                           
                            <br>
                                   <input name="id_customer" type="hidden" value="<?php echo $id_customer; ?>"> 
                                    <input class="form-control" name="nama"value="Name : <?php echo $name; ?>" readonly>
                                    <br>
                                    <input class="form-control" name="nama"value="Phone Number : <?php echo $phone_number; ?>" readonly>
                                    <br>
                                    <input class="form-control" name="nama"value="Address : <?php echo $address; ?>" readonly>
                                    <br>
                                    <center><img src="<?php echo base_url('assets/images/customer/').$card_identity ?>" width="150px"></center>
                                   
                        </div>
                        <div class="modal-footer">
                            <button class="btn" data-dismiss="modal" aria-hidden="true">Cancel</button>
                            <button type="submit" class="btn btn-success">Verified</button>
                        </div>
                    </form>
                </div>
                </div>
                </div>
            <?php
        }
        ?>


<?php 
                  foreach ($customer->result_array() as $sws){
                      
                
                    $id_customer=$sws['id_customer'];
                    $name=$sws['name'];
                    $address=$sws['address'];
                    $status=$sws['status'];
                    $phone_number=$sws['phone_number'];
                    $card_identity=$sws['card_identity'];
              ?>
               <div id="delete<?php echo $id_customer?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
                    <div class="modal-dialog">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h3 class="modal-title" id="myModalLabel"><i class="fa fa-trash"></i> Delete This Customer ?</h3>
                    </div>
                    <form class="form-horizontal" method="post" action="<?php echo base_url().'customer/delete'?>">
                        <div class="modal-body">
                           
                            <br>
                                   <input name="id_product" type="hidden" value="<?php echo $id_customer; ?>"> 
                                    <input class="form-control" name="nama"value="Name : <?php echo $name; ?>" readonly>
                                    <br>
                                    <input class="form-control" name="nama"value="Address : <?php echo $address; ?>" readonly>
                                    <br>
                                    <input class="form-control" name="nama"value="Phone Number : <?php echo $phone_number; ?>" readonly>
                                    <br>
                                    <center><img src="<?php echo base_url('assets/images/customer/').$card_identity ?>" width="150px"></center>
                                   
                        </div>
                        <div class="modal-footer">
                            <button class="btn" data-dismiss="modal" aria-hidden="true">Cancel</button>
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </div>
                    </form>
                </div>
                </div>
                </div>
            <?php
        }
        ?>

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
