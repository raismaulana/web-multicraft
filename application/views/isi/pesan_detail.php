                      <section class="panel">
                          
                              

                              <div class="col-md-12">
                                <div class="panel-body">
                                  <h4 class="pro-d-title">
                                      <a href="#" class="">
                                          <?php $i = 1;
                                          if(!empty($files)): foreach($files as $file): ?>
                                            
                                                <?php echo $file->nama_penerima; ?>
                                            <?php  if ($i++ == 1) break; ?>
                                            <?php endforeach; else: ?>
                                            <p>File(s) not found.....</p>
                                          <?php endif; ?>
                                      </a>
                                  </h4>

                                  <p>
                                    <?php $i = 1;
                                    if(!empty($files)): foreach($files as $file): ?>
                                          
                                                <?php echo $file->alamat_penerima; ?>,
                                                
                                          <?php  if ($i++ == 1) break; ?>
                                          <?php endforeach; else: ?>
                                          <p>File(s) not found.....</p>
                                    <?php endif; ?>
                                  </p>
                                  
                                  
                                      <span class="posted_in"> 
                                        <strong>No HP:</strong> 
                                        <a>
                                        <?php $i = 1;
                                        if(!empty($files)): foreach($files as $file): ?>
                                            
                                                <?php echo $file->no_hp_penerima; ?>
                                            <?php  if ($i++ == 1) break; ?>
                                            <?php endforeach; else: ?>
                                            <p>File(s) not found.....</p>
                                          <?php endif; ?>
                                        </a>
                                      </span></br></br>


                                      <span class="posted_in"> 
                                        <strong>Kode Pesan:</strong> 
                                        <a>
                                        <?php $i = 1;
                                        if(!empty($files)): foreach($files as $file): ?>
                                            <?php echo $file->invoice;?>

                                            <?php  if ($i++ == 1) break; ?>
                                            <?php endforeach; else: ?>
                                            <p>File(s) not found.....</p>
                                          <?php endif; ?>
                                        </a></span></br></br>


                                      <span class="posted_in"> 
                                        <strong>Status :</strong> 
                                        <a>
                                        <?php $i = 1;
                                        if(!empty($files)): foreach($files as $file): ?>
                                            <?php $status = $file->status;
      if ($status == 0){
        $data = '<span class="label label-danger label-mini">belum bayar</span>';
      }elseif($status == 1){
        $data = '<span class="label label-primary label-mini">sudah bayar</span>';
      }else{
        $data = '<span class="label label-success label-mini">pengiriman</span>';
      }?>
                                                <?php echo $data; ?>

                                            <?php  if ($i++ == 1) break; ?>
                                            <?php endforeach; else: ?>
                                            <p>File(s) not found.....</p>
                                          <?php endif; ?>
                                        </a></span>
                                      </div>

                      <div class="panel-body">
                          
                          <?php echo $tabel; ?>

                          <span class="posted_in"> 
                              <strong>Ongkos Kirim:
                                <?php $i = 1;
                                    if(!empty($files)): foreach($files as $file): ?>
                                      <?php echo $file->biaya_pengiriman; ?>
                                      <?php  if ($i++ == 1) break; ?>
                                      <?php endforeach; else: ?>
                                    <p>File(s) not found.....</p>
                                <?php endif; ?>

                              </strong>
                          </span>

                          <div class="product_meta">
                          <span class="posted_in"> 
                              <strong>Total Pembayaran:
                                <?php $i = 1;
                                    if(!empty($files)): foreach($files as $file): ?>
                                      <?php echo "Rp. ".$file->total_pembayaran; ?>
                                      <?php  if ($i++ == 1) break; ?>
                                      <?php endforeach; else: ?>
                                    <p>File(s) not found.....</p>
                                <?php endif; ?>

                              </strong>
                          </span>
                        </div>

                                <div class="pull-right">
                                  <p>
                                      <a href="<?php echo base_url();?>pesan" class="btn btn-round btn-danger" type="button"><i class="icon-sign-out"></i> kembali</a>
                                  </p>
                                </div>


                        </div>
                     </div>
                  </section>