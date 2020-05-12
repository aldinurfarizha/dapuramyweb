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
    <h1>Transaction with Cash Method</h1>
    </center>
    <br>
    <?php if($this->session->flashdata('display') == TRUE):?>
	<div class="alert alert-success alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
   <span aria-hidden="true">&times;</span>
  </button>
  <strong>Succsess !</strong> Order Status Has Been Changed
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
    <th width="10%"> Order ID</th>
  <th width="15%"><i class="fa fa-address-book"></i> Customer Name</th>
  <th width="15%"><i class="fa fa-map-marker"></i> Address</th>
  <th width="15%"><i class="fa fa-dollar"></i> Price Total</th>
  <th width="5%"> Description</th>
  <th width="16%"><i class="fa fa-check-circle"></i> Status</th>
  
  <th><i class="fa fa-gears"></i> Action</th>

 
  
</tr>
</thead>
<?php 
                  $no=0;
                    foreach ($order->result_array() as $sws):
                        $no++;
                        $id_order=$sws['id_order'];
                        $method=$sws['method'];
                        $price_total=$sws['price_total'];
                        $name=$sws['name'];
                        $status=$sws['status_order'];
                        $address=$sws['address'];
                ?>
<tr>
  <td><?php echo $no;?></td>
  <td><center><?php echo $id_order;?></center></td>
  <td><?php echo $name;?></td>
  <td><?php echo $address;?></td>
    <td><?php echo 'Rp. '.number_format($price_total, 0, ".", ".");?></td>
    <td><?php echo ' <a href="description/'.$id_order.'">DESCRIPTION</a>';?></td>

    <td>

    <?php
$status;

switch ($status) {
    case "0":
      echo '<span class="btn-sm btn-warning"><i class="fa fa-clock-o"></i> Order Has Been Placed</span>';
        break;
    case "1":
      echo '<span class="btn-sm btn-primary"><i class="fa fa-refresh"></i> Order In Process</span>';
        break;
        case "3":
          echo '<span class="btn-sm btn-success"><i class="fa fa-check"></i> Order Is Ready</span>';
            break;
          case "99":
            echo '<span class="btn-sm btn-danger"><i class="fa fa-close"></i> Order Cancle</span>';
            break;
    default:
    echo '<span class="btn-sm btn-danger"><i class="fa fa-close"></i> Order Cancle</span>';
}
?> 

    </td>
    

    
    <td><center>
    <a class="btn btn-sm bg-aqua" href="#delete<?php echo $id_order?>" data-toggle="modal" title="Change"><span class="fa fa-edit"></span> Change Status</a>

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
                  
                  foreach ($order->result_array() as $sws){
                    $id_customer=$sws['id_customer'];
                    $id_order=$sws['id_order'];
                    $method=$sws['method'];
                    $price_total=$sws['price_total'];
                    $name=$sws['name'];
                    $status=$sws['status_order'];
                    $token=$sws['token_fcm'];
              ?>
               <div id="delete<?php echo $id_order?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
                    <div class="modal-dialog">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h3 class="modal-title" id="myModalLabel"><i class="fa fa-edit"></i> Change Status This Order ?</h3>
                    </div>
                    <form class="form-horizontal" method="post" action="<?php echo base_url().'transaction/change_status_cod'?>">
                        <div class="modal-body">
                           
                            <br>
                                   <input name="id_order" type="hidden" value="<?php echo $id_order; ?>"> 
                                   <input name="token" type="hidden" value="<?php echo $token; ?>"> 
                                   <input name="id_customer" type="hidden" value="<?php echo $id_customer;?>"> 
                        
                                    <br>
                                    <input class="form-control" name="nama"value="Customer Name : <?php echo $name; ?>" readonly>
                                    <br>
                                    <h4>
      &nbsp;
      <label>
				<input type="radio" name="metode" id="metode" value="1">Order In Process
      </label>
      &nbsp;
      <label>
				<input type="radio" name="metode" id="metode" value="3">Order Is Ready
      </label>
      </h4>
                                   
                        </div>
                        <div class="modal-footer">
                            <button class="btn" data-dismiss="modal" aria-hidden="true">Cancel</button>
                            <button type="submit" class="btn btn-success">Change</button>
                        </div>
                    </form>
                </div>
                </div>
                </div>
            <?php
        }
        ?>


<!-- Modal -->





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
