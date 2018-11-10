 
              <!-- page start-->
              <section class="panel">
                  <header class="panel-heading">
                      KATEGORI PRODUK 
                  </header>
                  <div class="panel-body">
                      <div class="adv-table editable-table ">
                          <div class="clearfix">
                              <div class="btn-group" >
                                <a href="<?php echo base_url();?>kategori_produk/kategori_produk_tambah">
                                  <button id="" class="btn green" >
                                      Tambah Kategori Produk <i class="icon-plus"></i>
                                  </button>
                                </a>
                              </div>
                               <div class="space15"></div>
                          <?php echo $tabel; ?>
                            <div class="text-center">
                               <?php echo $this->session->flashdata('info'); ?>
                            </div>
                          </div>
                              <div class="btn-group pull-right">
                                  <button class="btn dropdown-toggle" data-toggle="dropdown">Tools <i class="icon-angle-down"></i>
                                  </button>
                                  <ul class="dropdown-menu pull-right">
                                      <li><a href="#">Print</a></li>
                                      <li><a href="#">Save as PDF</a></li>
                                      <li><a href="#">Export to Excel</a></li>
                                  </ul>
                              </div>
                          </div>
                         

                          </div>
                      </div>
                  </div>
              </section>
              <!-- page end-->
            







