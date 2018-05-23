
              <!-- page start-->
              <div class="row">
                  <div class="col-lg-12">
                      <section class="panel">
                          <header class="panel-heading" >
                              Tambah Kategori Produk
                          </header>

                          <div class="panel-body">
                            
                              <?php echo form_open(); ?>
                              <div class="form-inline" role="form" class="form-inline" role="form">
                              
                              <?php echo validation_errors(); ?>
                                  <div class="form-group">
                                      <input name="nama_kategori" type="" class="form-control"  placeholder="masukan nama kategori" >
                                      
                                  </div>
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
                      
