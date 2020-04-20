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
    <h1>Product Data</h1>
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
    <th><i class="fa fa-cutlery"></i> Product Name</th>
	<th><i class="fa fa-address-book"></i> Description</th>
	<th><i class="fa fa-calendar"></i> Stock</th>
  <th><i class="fa fa-dollar"></i> Price</th>
  <th><i class="fa fa-picture-o"></i> picture</th>
	<th><i class="fa fa-check"></i> Status</th>
  <th><i class="fa fa-gears"></i> Action</th>

 
  
</tr>
</thead>
<?php 
                  $no=0;
                    foreach ($get_product->result_array() as $sws):
                        $no++;
                        $id_product=$sws['id_product'];
                        $product_name=$sws['product_name'];
                        $description=$sws['description'];
                        $stock=$sws['stock'];
                        $price=$sws['price'];
                        $picture=$sws['picture'];
                        $status=$sws['status'];
                      
						
            
                ?>
<tr>
	<td><?php echo $no;?></td>
	<td><?php echo $product_name;?></td>
	<td><?php echo $description;?></td>
    <td><?php echo $stock;?></td>
    <td><?php echo $price;?></td>
  <td><a href="<?php echo base_url('assets/images/product/').$picture ?>"> <img src="<?php echo base_url('assets/images/product/').$picture ?>" alt="<?php echo $picture;?>" height="100px"></a> </td>
  <td><?php if($status=="0"){
  
    echo '<span class="btn-sm btn-danger"><i class="fa fa-close"></i> NOT DISPLAY</span>';
  }
  else {
 
    echo '<span class="btn-sm btn-success"><i class="fa fa-check"></i> ON DISPLAY</span>';

  }
  ?></td>
    <td><center><a class="btn btn-sm btn-warning" href="#edit<?php echo $id_product?>" data-toggle="modal" title="Edit"><span class="fa fa-pencil"></span> Edit</a>
    <a class="btn btn-sm btn-danger" href="#delete<?php echo $id_product?>" data-toggle="modal" title="Delete"><span class="fa fa-trash"></span> Delete</a>
    <?php if($status==0){
        echo'<a class="btn btn-sm btn-primary" href="#display'.$id_product.'" data-toggle="modal" title="Display"><span class="fa fa-eye"></span> Display</a>';
    }
    else{
        echo'<a class="btn btn-sm btn-danger" href="#notdisplay'.$id_product.'" data-toggle="modal" title="Not Display"><span class="fa fa-close"></span>Not Display</a>';
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
                  
                  foreach ($get_product->result_array() as $sws){
                      
                
                    $id_product=$sws['id_product'];
                    $product_name=$sws['product_name'];
                    $description=$sws['description'];
                    $stock=$sws['stock'];
                    $price=$sws['price'];
                    $picture=$sws['picture'];
                    $status=$sws['status'];
              ?>
               <div id="display<?php echo $id_product?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
                    <div class="modal-dialog">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h3 class="modal-title" id="myModalLabel"><i class="fa fa-eye"></i>Are You sure to display this product in Order ?</h3>
                    </div>
                    <form class="form-horizontal" method="post" action="<?php echo base_url().'product/display_product'?>">
                        <div class="modal-body">
                           
                            <br>
                                   <input name="id_product" type="hidden" value="<?php echo $id_product; ?>"> 
                                    <input class="form-control" name="nama"value="Product Name : <?php echo $product_name; ?>" readonly>
                                    <br>
                                    <input class="form-control" name="nama"value="Description : <?php echo $description; ?>" readonly>
                                    <br>
                                    <center><img src="<?php echo base_url('assets/images/product/').$picture ?>" width="150px"></center>
                                   
                        </div>
                        <div class="modal-footer">
                            <button class="btn" data-dismiss="modal" aria-hidden="true">Cancel</button>
                            <button type="submit" class="btn btn-primary">Display</button>
                        </div>
                    </form>
                </div>
                </div>
                </div>
            <?php
        }
        ?>

<?php 
                  
                  foreach ($get_product->result_array() as $sws){
                      
                
                    $id_product=$sws['id_product'];
                    $product_name=$sws['product_name'];
                    $description=$sws['description'];
                    $stock=$sws['stock'];
                    $price=$sws['price'];
                    $picture=$sws['picture'];
                    $status=$sws['status'];
              ?>
               <div id="notdisplay<?php echo $id_product?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
                    <div class="modal-dialog">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h3 class="modal-title" id="myModalLabel"><i class="fa fa-clock-o"></i>Are You sure to not display this product in Order ?</h3>
                    </div>
                    <form class="form-horizontal" method="post" action="<?php echo base_url().'product/notdisplay_product'?>">
                        <div class="modal-body">
                           
                            <br>
                                   <input name="id_product" type="hidden" value="<?php echo $id_product; ?>"> 
                                    <input class="form-control" name="nama"value="Product Name : <?php echo $product_name; ?>" readonly>
                                    <br>
                                    <input class="form-control" name="nama"value="Description : <?php echo $description; ?>" readonly>
                                    <br>
                                    <center><img src="<?php echo base_url('assets/images/product/').$picture ?>" width="150px"></center>
                                   
                        </div>
                        <div class="modal-footer">
                            <button class="btn" data-dismiss="modal" aria-hidden="true">Cancel</button>
                            <button type="submit" class="btn btn-danger">Not Display</button>
                        </div>
                    </form>
                </div>
                </div>
                </div>
            <?php
        }
        ?>

<?php 
                  
                  foreach ($get_product->result_array() as $sws){
                      
                
                    $id_product=$sws['id_product'];
                    $product_name=$sws['product_name'];
                    $description=$sws['description'];
                    $stock=$sws['stock'];
                    $price=$sws['price'];
                    $picture=$sws['picture'];
                    $status=$sws['status'];
              ?>
               <div id="delete<?php echo $id_product?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
                    <div class="modal-dialog">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h3 class="modal-title" id="myModalLabel"><i class="fa fa-trash"></i> Delete This Product ?</h3>
                    </div>
                    <form class="form-horizontal" method="post" action="<?php echo base_url().'product/delete_product'?>">
                        <div class="modal-body">
                           
                            <br>
                                   <input name="id_product" type="hidden" value="<?php echo $id_product; ?>"> 
                                    <input class="form-control" name="nama"value="Product Name : <?php echo $product_name; ?>" readonly>
                                    <br>
                                    <input class="form-control" name="nama"value="Description : <?php echo $description; ?>" readonly>
                                    <br>
                                    <center><img src="<?php echo base_url('assets/images/product/').$picture ?>" width="150px"></center>
                                   
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

<!-- Modal -->



<?php 
                 
                    foreach ($get_product->result_array() as $sws){
                  
                        $id_product=$sws['id_product'];
                        $product_name=$sws['product_name'];
                        $description=$sws['description'];
                        $stock=$sws['stock'];
                        $price=$sws['price'];
                        $picture=$sws['picture'];
                        $status=$sws['status'];
						
                ?>

<div class="modal fade" id="edit<?php echo $id_product;?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title" id="exampleModalLabel"><i class="fa fa-pencil"></i> Edit Product</h1>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="post"  enctype="multipart/form-data" action="<?php echo base_url().'product/edit_product'; ?>">
      <div class="modal-body">
      
    
		<div class="form-group">
        
    <input type="text" value="<?php echo $id_product?>" name="id_product" hidden>
		<label>Product Name</label>
		<input type="text" value="<?php echo $product_name?>" name="product_name" class="form-control" required>
		<label>Description</label>
		<input type="text" value="<?php echo $description?>" name="description"class="form-control" required>
		<label>Stock</label>
        <input type="text" value="<?php echo $stock?>" name="stock" class="form-control"required>
        <label>Price</label>
        <input type="text" value="<?php echo $price?>" name="price" class="form-control"required>
        <label>Picture</label>
		<input type="file" name="picture" class="form-control">


      </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
        <button type="submit" class="btn btn-primary">Simpan</button>
      
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
