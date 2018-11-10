
              <!-- page start-->
              <div class="row">
                  <div class="col-lg-12">
                      <section class="panel">
                          <header class="panel-heading" >
                              Edit Kategori Produk
                          </header>

                          <div class="panel-body">
                            
                              <?php echo form_open(); ?>
                              <div class="form-inline" role="form" class="form-inline" role="form">
                              
                              <?php echo validation_errors(); ?>
                                  <div class="form-group">
                                    
                                      <input name="nama_kategori" class="form-control" value="<?php echo $editdata->nama_kategori; ?>">
                                      
                                  </div>
                                   <input type="hidden" name="id" value="<?php echo $editdata->id_kategori; ?>">
                                   <input name="submit" type="submit" class="btn btn-success" value="simpan">   
                                </div>
                              <?php echo form_close(); ?>
                              <?php if($this->session->flashdata('info')): ?> 
                              <div class="">
                              <div class="text-center"> <?php echo $this->session->flashdata('info'); ?></div>
                            </div>
                          <?php endif; ?>
                          </div>
                      </section> 
                      
