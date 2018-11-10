 <!-- page start-->
              <div class="row">
                  <div class="col-lg-12">
                      <section class="panel">
                          <header class="panel-heading" >
                              Tambah Rekening
                          </header>

                          <div class="panel-body">
                            
                              <?php echo form_open("rekening/rekening_produk_tambah"); ?>
                              <div class="panel-body" form role="form">
                              
                                    <?php echo validation_errors(); ?>
                                        <div class="form-group">
                                            <label>Nama Bank</label>
                                            <input name="nama_bank" type="" class="form-control"  placeholder="Masukan Nama Bank" >    
                                        </div>
                                         <div class="form-group">
                                            <label>Nama Pemilik</label>
                                            <input name="nama_pemilik" type="" class="form-control"  placeholder="Masukan Nama Pemilik" >    
                                        </div>
                                         <div class="form-group">
                                            <label>No Rekening</label>
                                            <input name="no_rekening" type="" class="form-control"  placeholder="Masukan No Rekening" >    
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