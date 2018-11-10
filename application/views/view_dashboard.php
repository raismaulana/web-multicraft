<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Mosaddek">
    <meta name="keyword" content="FlatLab, Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
    <link rel="shortcut icon" href="<?php echo base_url();?>assets/img/ShortIcon.png">

    <title>Home</title>

    <!-- Bootstrap core CSS -->
    <link href="<?php echo base_url();?>assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/css/bootstrap-reset.css" rel="stylesheet">

    
    <link href="<?php echo base_url();?>assets/assets/data-tables/DT_bootstrap.css" rel="stylesheet">
    <!--external css-->
    <link href="<?php echo base_url();?>assets/assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link href="<?php echo base_url();?>assets/assets/jquery-easy-pie-chart/jquery.easy-pie-chart.css" rel="stylesheet" type="text/css" media="screen"/>
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/owl.carousel.css" type="text/css">
    <!-- Custom styles for this template -->
    <link href="<?php echo base_url();?>assets/css/style.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/css/style-responsive.css" rel="stylesheet" />
    <link href="<?php echo base_url();?>assets/css/slidebars.css" rel="stylesheet">

  </head>

  <body>

  <section id="container" >
      <!--header start-->
      <header class="header white-bg">
            <div class="sidebar-toggle-box">
                <div data-original-title="Toggle Navigation" data-placement="right" class="icon-reorder tooltips"></div>
            </div>
            <!--logo start-->
            <a href="index.html" class="logo"><img src="<?php echo base_url();?>assets/img/logo.png" width="120px" ></a>
            <!--logo end-->
            
            <div class="top-nav ">
                <!--search & user info start-->
                <ul class="nav pull-right top-menu">
                    <li>
                        <input type="text" class="form-control search" placeholder="Search">
                    </li>
                    <!-- user login dropdown start-->
                    <li class="dropdown">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <span class="username"><?php echo $this->session->userdata("nama");?></span>
                            <b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu extended logout">
                            <div class="log-arrow-up"></div>
                            <li><a href="#"><i class=" icon-suitcase"></i>Profile</a></li>
                            <li><a href="#"><i class="icon-cog"></i> Settings</a></li>
                            <li><a href="#"><i class="icon-bell-alt"></i> Notification</a></li>
                            <li><a href="<?php echo base_url();?>login/logout"><i class="icon-key"></i> Log Out</a></li>
                        </ul>
                    </li>
                    <!-- user login dropdown end -->
                </ul>
                <!--search & user info end-->
            </div>
        </header>
      <!--header end-->
      <!--sidebar start-->
      <aside>
          <div id="sidebar"  class="nav-collapse ">
              <!-- sidebar menu start-->
              <ul class="sidebar-menu" id="nav-accordion">
                  
                  <li class="sub-menu">
                      <a href="javascript:;" >
                          <i class="icon-tasks"></i>
                          <span>Tambah Data</span>
                      </a>
                      <ul class="sub">
                          <li><a  href="<?php echo base_url();?>kategori_produk/kategori_produk_tambah">Tambah Kategori</a></li>
                          <li><a  href="<?php echo base_url();?>produk/produk_tambah">Tambah Produk</a></li>
                          <li><a  href="<?php echo base_url();?>rekening/rekening_produk_tambah">Tambah Rekening</a></li>
                          <li><a  href="<?php echo base_url();?>kurir/kurir_produk_tambah">Tambah Kurir</a></li>
                      </ul>
                  </li>
                  <li class="sub-menu">
                      <a href="javascript:;" >
                          <i class="icon-th"></i>
                          <span>Data Tabel</span>
                      </a>
                      <ul class="sub">
                          <li><a  href="<?php echo base_url();?>kategori_produk">Data Kategori</a></li>
                          <li><a  href="<?php echo base_url();?>produk">Data Produk</a></li>
                          <li><a  href="<?php echo base_url();?>rekening">Data Rekening</a></li>
                          <li><a  href="<?php echo base_url();?>kurir">Data Kurir</a></li>
                          <li><a  href="<?php echo base_url();?>user">Data User</a></li>
                      </ul>
                  </li>
                  <li class="sub-menu">
                      <a href="javascript:;" >
                          <i class="icon-shopping-cart"></i>
                          <span>Transaksi</span>
                      </a>
                      <ul class="sub">
                          <li><a  href="<?php echo base_url();?>pesan">Pesanan</a></li>
                          <li><a  href="<?php echo base_url();?>pembayaran">Pembayaran</a></li>
                          <li><a  href="<?php echo base_url();?>pengiriman">Pengiriman</a></li>
                      </ul>
                  </li>
              </ul>
              <!-- sidebar menu end-->
          </div>
      </aside>
      <!--sidebar end-->
      <!--main content start-->
      <section id="main-content">
          <section class="wrapper site-min-height">
              <!--state overview start--> 
              <?php $this->load->view($content);?>

              
          </section>
      </section>
      <!--footer start-->
      <footer class="site-footer">
          <div class="text-center">
              2013 &copy; FlatLab by VectorLab.
              <a href="#" class="go-top">
                  <i class="icon-angle-up"></i>
              </a>
          </div>
      </footer>
      <!--footer end-->
  </section>

    <!-- js placed at the end of the document so the pages load faster -->
    <script src="<?php echo base_url();?>assets/js/jquery.js"></script>
    <script src="<?php echo base_url();?>assets/js/jquery-1.8.3.min.js"></script>
    <script src="<?php echo base_url();?>assets/js/jquery-ui-1.9.2.custom.min.js"></script>
    <script src="<?php echo base_url();?>assets/js/jquery-migrate-1.2.1.min.js"></script>
    <script src="<?php echo base_url();?>assets/js/bootstrap.min.js"></script>
    <script class="include" type="text/javascript" src="<?php echo base_url();?>assets/js/jquery.dcjqaccordion.2.7.js"></script>
    <script src="<?php echo base_url();?>assets/js/jquery.scrollTo.min.js"></script>
    <script src="<?php echo base_url();?>assets/js/jquery.nicescroll.js" type="text/javascript"></script>
    <script src="<?php echo base_url();?>assets/js/jquery.sparkline.js" type="text/javascript"></script>
    <script src="<?php echo base_url();?>assets/assets/jquery-easy-pie-chart/jquery.easy-pie-chart.js"></script>
    <script src="<?php echo base_url();?>assets/js/owl.carousel.js" ></script>
    <script src="<?php echo base_url();?>assets/js/jquery.customSelect.min.js" ></script>
    <script src="<?php echo base_url();?>assets/js/respond.min.js" ></script>
    <script type="text/javascript" src="<?php echo base_url();?>assets/assets/data-tables/jquery.dataTables.js"></script>
    <script class="include" type="text/javascript" src="<?php echo base_url();?>assets/js/jquery.dcjqaccordion.2.7.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>assets/assets/data-tables/DT_bootstrap.js"></script>
    <!--right slidebar-->
    <script src="<?php echo base_url();?>assets/js/slidebars.min.js"></script>
    <!--common script for all pages-->
    <script src="<?php echo base_url();?>assets/js/common-scripts.js"></script>
    <!--script for this page-->
    <script src="<?php echo base_url();?>assets/js/sparkline-chart.js"></script>
    <script src="<?php echo base_url();?>assets/js/easy-pie-chart.js"></script>
    <script src="<?php echo base_url();?>assets/js/count.js"></script>
    <script src="<?php echo base_url();?>assets/js/editable-table.js"></script>

 <script>

      //owl carousel

      $(document).ready(function() {
          $("#owl-demo").owlCarousel({
              navigation : true,
              slideSpeed : 300,
              paginationSpeed : 400,
              singleItem : true,
        autoPlay:true

          });
      });

      //custom select box

      $(function(){
          $('select.styled').customSelect();
      });

  </script>

       <!-- END JAVASCRIPTS -->
      <script>
          jQuery(document).ready(function() {
              EditableTable.init();
          });
      </script>
  </body>
</html>
