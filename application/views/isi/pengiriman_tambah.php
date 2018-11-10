<div class="row">
                  <div class="col-lg-12">
                      <section class="panel">
                          <header class="panel-heading" >
                              Tambah Data Pengiriman
                          </header>

                          <div class="panel-body">
                            
                              <?php echo form_open(); ?>
                              <div class="panel-body" form role="form">
                              
                                    <?php echo validation_errors(); ?>
                                        <div class="form-group">
                                            <label>Nomer Resi</label>
                                            <input name="no_resi" type="" class="form-control"  placeholder="masukan nomer resi" >    
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