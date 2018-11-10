                      <section class="panel">
                          <div class="panel-body">
                              <div class="col-md-6">
                                  <div class="pro-img-details">
                                      <?php if(!empty($files)): foreach($files as $file): ?>
                                     
                                          <img src="<?php echo base_url('foto/'.$file->foto); ?>" alt="" >
                                      
                                      <?php endforeach; else: ?>
                                      <p>File(s) not found.....</p>
                                      <?php endif; ?>
                                  </div>
                              </div>

                              <div class="col-md-6">
                                  <h4 class="pro-d-title">
                                      <a href="#" class="">
                                          <?php if(!empty($files)): foreach($files as $file): ?>
                                            
                                                <?php echo $file->nama_user; ?>
                                            
                                            <?php endforeach; else: ?>
                                            <p>File(s) not found.....</p>
                                          <?php endif; ?>
                                      </a>
                                  </h4>
                                  <p>

                                    <?php if(!empty($files)): foreach($files as $file): ?>
                                          
                                                <?php echo $file->detail_alamat; ?>,
                                                <?php echo $file->kecamatan; ?>,
                                                <?php echo $file->kabupaten; ?>,
                                                <?php echo $file->provinsi; ?>,
                                                <?php echo $file->negara; ?>.
                                          
                                          <?php endforeach; else: ?>
                                          <p>File(s) not found.....</p>
                                    <?php endif; ?>

                                  </p>
                                  
                                  <div class="product_meta">
                                      <span class="posted_in"> 
                                        <strong>Email:</strong> 
                                        <a>
                                        <?php if(!empty($files)): foreach($files as $file): ?>
                                            
                                                <?php echo $file->email; ?>
                                            
                                            <?php endforeach; else: ?>
                                            <p>File(s) not found.....</p>
                                          <?php endif; ?>
                                        </a></span>
                                      <span class="posted_in"> 
                                        <strong>No HP:</strong> 
                                        <a>
                                        <?php if(!empty($files)): foreach($files as $file): ?>
                                            
                                                <?php echo $file->no_hp; ?>
                                            
                                            <?php endforeach; else: ?>
                                            <p>File(s) not found.....</p>
                                          <?php endif; ?>
                                        </a></span>
                                      <span class="posted_in"> 
                                        <strong>Tanggal Lahir:</strong> 
                                        <a>
                                        <?php if(!empty($files)): foreach($files as $file): ?>
                                            
                                                <?php echo $file->tgl_lahir; ?>
                                            
                                            <?php endforeach; else: ?>
                                            <p>File(s) not found.....</p>
                                          <?php endif; ?>
                                        </a></span>
                                      <span class="posted_in"> 
                                        <strong>Gender:</strong> 
                                        <a>
                                        <?php if(!empty($files)): foreach($files as $file): ?>
                                            
                                                <?php echo $file->gender; ?>
                                            
                                            <?php endforeach; else: ?>
                                            <p>File(s) not found.....</p>
                                          <?php endif; ?>
                                        </a></span>





                                  </div>
                                  <div class="pull-right">
                                  <p>
                                      <a href="<?php echo base_url();?>user" class="btn btn-round btn-danger" type="button"><i class="icon-sign-out"></i> kembali</a>
                                  </p>
                                </div>
                              </div>
                          </div>
                      </section>