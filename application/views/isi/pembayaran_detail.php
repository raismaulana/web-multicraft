                      <section class="panel">
                          <div class="panel-body">
                              <div class="col-md-6">

                                <span class="posted_in"> 
                                        <strong>Kode Pesanan:</strong> 
                                        <a>
                                        <?php if(!empty($files)): foreach($files as $file): ?>
                                            
                                                <?php echo $file->checkout_invoice; ?>
                                            
                                            <?php endforeach; else: ?>
                                            <p>File(s) not found.....</p>
                                          <?php endif; ?>
                                        </a></span>


                                  <div class="pro-img-details">
                                      <?php if(!empty($files)): foreach($files as $file): ?>
                                     
                                          <img src="<?php echo base_url('uploads/bayar/'.$file->foto_bukti); ?>" alt="" >
                                      
                                      <?php endforeach; else: ?>
                                      <p>File(s) not found.....</p>
                                      <?php endif; ?>
                                  </div>
                              </div>


                              <div class="col-md-6">                               
                                  
                                      <span class="posted_in"> 
                                        <strong>Waktu Bayar :</strong> 
                                        <a>
                                        <?php if(!empty($files)): foreach($files as $file): ?>
                                            
                                                <?php echo $file->tgl_bayar; ?> /
                                                <?php echo $file->jam_bayar; ?>
                                            
                                            <?php endforeach; else: ?>
                                            <p>File(s) not found.....</p>
                                          <?php endif; ?>
                                        </a></span></br></br>
                                      <span class="posted_in"> 
                                        <strong>Rekening :</strong> 
                                        <a>
                                        <?php if(!empty($files)): foreach($files as $file): ?>
                                            
                                                <?php echo $file->nomor_rekening; ?>
                                            
                                            <?php endforeach; else: ?>
                                            <p>File(s) not found.....</p>
                                          <?php endif; ?>
                                        </a></span></br></br>
                                      <span class="posted_in"> 
                                        <strong>Nominal :</strong> 
                                        <a>
                                        <?php if(!empty($files)): foreach($files as $file): ?>
                                            
                                                <?php echo "Rp. ".$file->nominal_bayar; ?>
                                            
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
        $data = '<span class="label label-danger label-mini">BARU</span>';
      }elseif($status == 1){
        $data = '<span class="label label-success label-mini">DONE</span>';
      }?>
                                                <?php echo $data; ?>

                                            <?php  if ($i++ == 1) break; ?>
                                            <?php endforeach; else: ?>
                                            <p>File(s) not found.....</p>
                                          <?php endif; ?>
                                        </a></span>
                                      
</div></br></br>
<p class="col-lg-4"></p></br></br>
<p class="col-lg-4"></p></br></br>
                                 <div class="col-lg-4">
                                  <div class="pull-right">
                                    <?php if(!empty($files)): foreach($files as $file): ?>
                                            <?php $id = $file->id_bayar; ?>
                                  <p>
                                      <a href="<?php echo base_url();?>pembayaran/update/<?php echo $id;?>" class="btn btn-round btn-success" type="button"><i class="icon-sign-out"></i> ACCEPT</a>
                                  </p>
                                            
                                            <?php endforeach; else: ?>
                                            <p>File(s) not found.....</p>
                                          <?php endif; ?>

                                          <?php if($this->session->flashdata('info')): ?> 
                              <div class="">
                              <div class="text-center"> <?php echo $this->session->flashdata('info'); ?></div>
                            </div>
                          <?php endif; ?>
                                  
                                </div>
                              </div>
                          </div>
                      </section>