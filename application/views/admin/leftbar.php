        <?php $hakakses=$this->session->userdata('hakakses'); ?>
        <?php  if($this->session->userdata('hakakses')=='0'){?>
          <!-- Manager -->
          <aside class="main-sidebar">
  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">
    <!-- Sidebar user panel -->
    <!-- sidebar menu: : style can be found in sidebar.less -->
   
    <ul class="sidebar-menu" data-widget="tree">
      <li class="header">Navigasi Utama</li>
      <li class="<?php if($this->uri->segment('1')=='dashboard') { echo"active" ;}?>">
        <a href="<?php echo base_url() ?>">
          <i class="fa fa-dashboard"></i> <span>Dashboard</span>
          <span class="pull-right-container">
          </span>
        </a>
      </li>


      <li class="treeview <?php if($this->uri->segment('1')=='product') { echo"active menu-open" ;}?>">
        <a href="#">
          <i class="fa fa-credit-card"></i>
          <span>Product</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li class="<?php if($this->uri->segment('2')=='list_product') { echo"active" ;}?>"><a href="<?php echo base_url('product/list_product') ?>"><i class="fa fa-credit-card"></i>List Product</a></li>
          <li class="<?php if($this->uri->segment('2')=='add_new_product') { echo"active" ;}?>"><a href="<?php echo base_url('product/add_new_product') ?>"><i class="fa fa-address-book"></i>Add New Product</a></li>
        </ul>
      </li>

      <li class="treeview <?php if($this->uri->segment('1')=='customer'){echo"active menu-open";}?>">
        <a href="#">
          <i class="fa fa-database"></i>
          <span>Customer</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li class="<?php if($this->uri->segment('2')=='customer_data') { echo"active";}?>"><a href="<?php echo base_url('customer/customer_data') ?>"><i class="fa fa-users"></i>Customer Data</a></li>
        </ul>
      </li>
      <li class="treeview <?php if($this->uri->segment('1')=='transaction') { echo"active menu-open" ;}?>">
        <a href="#">
          <i class="fa fa-dollar"></i>
          <span>Transaction</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li class="<?php if($this->uri->segment('2')=='cash') { echo"active" ;}?>"><a href="<?php echo base_url('transaction/cash') ?>"><i class="fa fa-money"></i>Cash</a></li>
          <li class="<?php if($this->uri->segment('2')=='cash_on_delivery') { echo"active" ;}?>"><a href="<?php echo base_url('transaction/cash_on_delivery') ?>"><i class="fa fa-car"></i>Cash On Delivery</a></li>
          <li class="<?php if($this->uri->segment('2')=='transfer') { echo"active" ;}?>"><a href="<?php echo base_url('transaction/transfer') ?>"><i class="fa fa-university"></i>Transfer</a></li>
        </ul>
      </li>
      <li class="treeview <?php if($this->uri->segment('1')=='voting') { echo"active menu-open" ;}?>">
        <a href="#">
          <i class="fa fa-check"></i>
          <span>Voting</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li class="<?php if($this->uri->segment('2')=='see_vote') { echo"active" ;}?>"><a href="<?php echo base_url('voting/see_vote') ?>"><i class="fa fa-check"></i> See Vote</a></li>
         
        </ul>
      </li>



      <li class="treeview <?php if($this->uri->segment('1')=='report') { echo"active menu-open" ;}?>">
        <a href="#">
          <i class="fa fa-gears"></i>
          <span>Setting</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
        <li class="<?php if($this->uri->segment('2')=='banner') { echo"active" ;}?>"><a href="<?php echo base_url('report/banner') ?>"><i class="fa fa-image"></i> Banner Android</a></li>
          <li class="<?php if($this->uri->segment('2')=='report') { echo"active" ;}?>"><a href="<?php echo base_url('report/rep') ?>"><i class="fa fa-id-card-o"></i> Report</a></li>
       
        </ul>
      </li>

  


    
      <li class="header"></li>
      <li><a href="<?php echo base_url('login/logout') ?>"><i class="fa fa-sign-out text-red"></i> <span>Log Out</span></a></li>
    </ul>
  </section>
  <!-- /.sidebar -->
</aside>


          <?php } ?>
          <?php  if($this->session->userdata('hakakses')=='1'){?>
          <!-- Personalia -->
          <aside class="main-sidebar">
  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">
    <!-- Sidebar user panel -->
    <!-- sidebar menu: : style can be found in sidebar.less -->
   
    <ul class="sidebar-menu" data-widget="tree">
      <li class="header">Navigasi Utama</li>
      <li class="<?php if($this->uri->segment('1')=='dashboard') { echo"active" ;}?>">
        <a href="<?php echo base_url() ?>">
          <i class="fa fa-dashboard"></i> <span>Dashboard</span>
          <span class="pull-right-container">
          </span>
        </a>
 
      <li class="treeview <?php if($this->uri->segment('1')=='pembayaran') { echo"active menu-open" ;}?>">
        <a href="#">
          <i class="fa fa-money"></i>
          <span>Pembayaran</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li class="<?php if($this->uri->segment('2')=='piutang_agen') { echo"active" ;}?>"><a href="<?php echo base_url('pembayaran/piutang_agen') ?>"><i class="fa fa-money"></i> Piutang Agen</a></li>
          <li class="<?php if($this->uri->segment('2')=='pembayaran_piutang_pelanggan') { echo"active" ;}?>"><a href="<?php echo base_url('pembayaran/pembayaran_piutang_pelanggan') ?>"><i class="fa fa-dollar"></i> Piutang Pelanggan</a></li>
          <li class="<?php if($this->uri->segment('2')=='pembayaran_utang_mitra') { echo"active" ;}?>"><a href="<?php echo base_url('pembayaran/pembayaran_utang_mitra') ?>"><i class="fa fa-credit-card"></i> Utang Mitra</a></li>
        </ul>
      </li>

      <li class="treeview <?php if($this->uri->segment('1')=='utang') { echo"active menu-open" ;}?>">
        <a href="#">
          <i class="fa fa-credit-card"></i>
          <span>Utang</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li class="<?php if($this->uri->segment('2')=='utang_mitra') { echo"active" ;}?>"><a href="<?php echo base_url('utang/utang_mitra') ?>"><i class="fa fa-credit-card"></i>Utang Mitra</a></li>
        </ul>
      </li>

      <li class="treeview <?php if($this->uri->segment('1')=='piutang') { echo"active menu-open" ;}?>">
        <a href="#">
          <i class="fa fa-download"></i>
          <span>Piutang</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li class="<?php if($this->uri->segment('2')=='piutang_agen') { echo"active" ;}?>"><a href="<?php echo base_url('piutang/piutang_agen') ?>"><i class="fa fa-download"></i> Agen</a></li>
          <li class="<?php if($this->uri->segment('2')=='piutang_pelanggan') { echo"active" ;}?>"><a href="<?php echo base_url('piutang/piutang_pelanggan') ?>"><i class="fa fa-user"></i> Pelanggan</a></li>
        </ul>
      </li>


      <li class="header"></li>
      <li><a href="<?php echo base_url('login/logout') ?>"><i class="fa fa-sign-out text-red"></i> <span>Log Out</span></a></li>
    </ul>
  </section>
  <!-- /.sidebar -->
</aside>

          <?php } ?>
          
      
          <?php if($this->session->userdata('hakakses')=='2'){?>
            <!-- Admin -->
            <aside class="main-sidebar">
  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">
    <!-- Sidebar user panel -->
    <!-- sidebar menu: : style can be found in sidebar.less -->
   
    <ul class="sidebar-menu" data-widget="tree">
      <li class="header">Navigasi Utama</li>
      <li class="<?php if($this->uri->segment('1')=='dashboard') { echo"active" ;}?>">
        <a href="<?php echo base_url() ?>">
          <i class="fa fa-dashboard"></i> <span>Dashboard</span>
          <span class="pull-right-container">
          </span>
        </a>
      </li>
      <li class="treeview <?php if($this->uri->segment('1')=='masterdata'){echo"active menu-open";}?>">
        <a href="#">
          <i class="fa fa-database"></i>
          <span>Pelanggan</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li class="<?php if($this->uri->segment('2')=='data_pelanggan') { echo"active";}?>"><a href="<?php echo base_url('masterdata/data_pelanggan') ?>"><i class="fa fa-users"></i>Data Pelanggan</a></li>

        </ul>
      </li>
      <li class="treeview <?php if($this->uri->segment('1')=='transaksi') { echo"active menu-open" ;}?>">
        <a href="#">
          <i class="fa fa-dollar"></i>
          <span>Transaksi</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li class="<?php if($this->uri->segment('2')=='input_order') { echo"active" ;}?>"><a href="<?php echo base_url('transaksi/input_order') ?>"><i class="fa fa-upload"></i>Input Order</a></li>
          <li class="<?php if($this->uri->segment('2')=='kelola_order') { echo"active" ;}?>"><a href="<?php echo base_url('transaksi/kelola_order') ?>"><i class="fa fa-pencil"></i>Kelola Order</a></li>
          <li class="<?php if($this->uri->segment('2')=='biaya_operasional') { echo"active" ;}?>"><a href="<?php echo base_url('transaksi/biaya_operasional') ?>"><i class="fa fa-car"></i>Biaya Operasional</a></li>
        </ul>
      </li>
     

     

     
      <li class="treeview <?php if($this->uri->segment('1')=='laporan') { echo"active menu-open" ;}?>">
        <a href="#">
          <i class="fa fa-laptop"></i>
          <span>Laporan</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li class="<?php if($this->uri->segment('2')=='resi') { echo"active" ;}?>"><a href="<?php echo base_url('laporan/resi') ?>"><i class="fa fa-id-card-o"></i> Resi</a></li>
          <li class="<?php if($this->uri->segment('2')=='nota') { echo"active" ;}?>"><a href="<?php echo base_url('laporan/nota') ?>"><i class="fa fa-file-text"></i> Label Pengiriman + Nota</a></li>
          <li class="<?php if($this->uri->segment('2')=='proforma_invoice') { echo"active" ;}?>"><a href="<?php echo base_url('laporan/proforma_invoice') ?>"><i class="fa fa-file"></i> Proforma Invoice</a></li>
          <li class="<?php if($this->uri->segment('2')=='surat_jalan') { echo"active" ;}?>"><a href="<?php echo base_url('laporan/surat_jalan') ?>"><i class="fa fa fa-check"></i> Surat Jalan</a></li>
          <li class="<?php if($this->uri->segment('2')=='laporan_biaya_operasional') { echo"active" ;}?>"><a href="<?php echo base_url('laporan/laporan_biaya_operasional') ?>"><i class="fa fa fa-calculator"></i> Biaya Operasional</a></li>
        </ul>
      </li>

     

       
      <li class="header"></li>
      <li><a href="<?php echo base_url('login/logout') ?>"><i class="fa fa-sign-out text-red"></i> <span>Log Out</span></a></li>
    </ul>
  </section>
  <!-- /.sidebar -->
</aside>

            <?php } ?>
        
            <?php if($this->session->userdata('hakakses')=='3'){?>
            <!-- Agen -->
            <aside class="main-sidebar">
  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">
    <!-- Sidebar user panel -->
    <!-- sidebar menu: : style can be found in sidebar.less -->
   
    <ul class="sidebar-menu" data-widget="tree">
      <li class="header">Navigasi Utama</li>
      <li class="<?php if($this->uri->segment('1')=='dashboard') { echo"active" ;}?>">
        <a href="<?php echo base_url() ?>">
          <i class="fa fa-dashboard"></i> <span>Dashboard</span>
          <span class="pull-right-container">
          </span>
        </a>
      </li>
    
      <li class="treeview <?php if($this->uri->segment('1')=='transaksi') { echo"active menu-open" ;}?>">
        <a href="#">
          <i class="fa fa-dollar"></i>
          <span>Transaksi</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li class="<?php if($this->uri->segment('2')=='input_order') { echo"active" ;}?>"><a href="<?php echo base_url('transaksi/input_order') ?>"><i class="fa fa-upload"></i>Input Order</a></li>
 
        </ul>
      </li>
     

     

     
      <li class="treeview <?php if($this->uri->segment('1')=='laporan') { echo"active menu-open" ;}?>">
        <a href="#">
          <i class="fa fa-laptop"></i>
          <span>Laporan</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li class="<?php if($this->uri->segment('2')=='resi') { echo"active" ;}?>"><a href="<?php echo base_url('laporan/resi') ?>"><i class="fa fa-id-card-o"></i> Resi</a></li>
          <li class="<?php if($this->uri->segment('2')=='nota') { echo"active" ;}?>"><a href="<?php echo base_url('laporan/nota') ?>"><i class="fa fa-file-text"></i> Label Pengiriman + Nota</a></li>
          <li class="<?php if($this->uri->segment('2')=='proforma_invoice') { echo"active" ;}?>"><a href="<?php echo base_url('laporan/proforma_invoice') ?>"><i class="fa fa-file"></i> Proforma Invoice</a></li>
          <li class="<?php if($this->uri->segment('2')=='surat_jalan') { echo"active" ;}?>"><a href="<?php echo base_url('laporan/surat_jalan') ?>"><i class="fa fa fa-check"></i> Surat Jalan</a></li>
    
       
        </ul>
      </li>

     

       
      <li class="header"></li>
      <li><a href="<?php echo base_url('login/logout') ?>"><i class="fa fa-sign-out text-red"></i> <span>Log Out</span></a></li>
    </ul>
  </section>
  <!-- /.sidebar -->
</aside>

            <?php } ?>
        
       

