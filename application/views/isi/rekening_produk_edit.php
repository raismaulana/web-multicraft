     <!-- page start-->
              <div class="row">
                  <div class="col-lg-12">
                      <section class="panel">
                          <header class="panel-heading" >
                              Edit Rekening
                          </header>

                          <div class="panel-body">
                            
                              <?php echo form_open(); ?>
                              <div class="panel-body" form role="form">
                              
                              <?php echo validation_errors(); ?>
                                  <div class="form-group">
                                  <label>Nama Bank</label>
                                      <input name="nama_bank" class="form-control" value="<?php echo $editdata->nama_bank; ?>">
                                  </div>
                                  <div class="form-group">
                                  <label>Nama Pemilik</label>
                                      <input name="nama_pemilik" class="form-control" value="<?php echo $editdata->nama_pemilik; ?>">
                                  </div>
                                  <div class="form-group">
                                  <label>N0 Rekening</label>
                                      <input name="no_rekening" class="form-control" value="<?php echo $editdata->no_rekening; ?>">
                                  </div>
                                   <input type="hidden" name="id" value="<?php echo $editdata->id_rekening; ?>">
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