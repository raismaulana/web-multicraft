     <!-- page start-->
              <div class="row">
                  <div class="col-lg-12">
                      <section class="panel">
                          <header class="panel-heading" >
                              Edit Kurir
                          </header>

                          <div class="panel-body">
                            
                              <?php echo form_open(); ?>
                              <div class="panel-body" form role="form">
                              
                              <?php echo validation_errors(); ?>
                              <div class="form-group">
                                    <label>Nama Kurir</label>
                                    <input name="nama_kurir" class="form-control" value="<?php echo $editdata->nama_kurir; ?>" > 
                              </div>
                               </div>
                                   <input type="hidden" name="id" value="<?php echo $editdata->id_kurir; ?>">
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

                              
                                   
                                    