 
              <!-- page start-->
              <section class="panel">
                  <header class="panel-heading">
                      KATEGORI PRODUK 
                  </header>
                  <div class="panel-body">
                      <div class="adv-table editable-table ">
                          <div class="clearfix">
                              <div class="btn-group" >
                                <a href="<?php echo base_url();?>dashboard/tambah_kategori_produk">
                                  <button id="" class="btn green" >
                                      Tambah Kategori Produk <i class="fa fa-plus"></i>
                                  </button>
                                </a>
                              </div>
                              <div class="btn-group pull-right">
                                  <button class="btn dropdown-toggle" data-toggle="dropdown">Tools <i class="fa fa-angle-down"></i>
                                  </button>
                                  <ul class="dropdown-menu pull-right">
                                      <li><a href="#">Print</a></li>
                                      <li><a href="#">Save as PDF</a></li>
                                      <li><a href="#">Export to Excel</a></li>
                                  </ul>
                              </div>
                          </div>
                          <div class="space15"></div>

                          <?php echo $tabel; ?>
                          <div class="">
                              <div class="text-center"> <?php echo $this->session->flashdata('info'); ?></div>
                            </div>

                          </div>
                      </div>
                  </div>
              </section>
              <!-- page end-->
            







