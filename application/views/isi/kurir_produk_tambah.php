 <!-- page start-->
              <div class="row">
                  <div class="col-lg-12">
                      <section class="panel">
                          <header class="panel-heading" >
                              Tambah Kurir
                          </header>

                          <div class="panel-body">
                            
                              <?php echo form_open("kurir/kurir_produk_tambah"); ?>
                               <div class="panel-body" form role="form">
                              
                                    <?php echo validation_errors(); ?>
                                    <div class="form-group">
                                            <label>Nama Kurir</label>
                                            <input name="nama_kurir" type="" class="form-control"  placeholder="Masukan Nama Kurir" >    
                                        </div>

                                     <input name="submit" type="submit" class="btn btn-info" value="simpan">   
                                      </div>

                              <?php echo form_close(); ?>
                              <?php if($this->session->flashdata('info')): ?> 
                              <div class="">
                              <div class="text-center"> <?php echo $this->session->flashdata('info'); ?></div>
                            </div>
                          <?php endif; ?>
                          </div>
                      </section> 