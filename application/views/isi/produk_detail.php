<style>
ul.gallery {
    clear: both;
    float: left;
    width: 100%;
    margin-bottom: -10px;
    padding-left: 3px;
}
ul.gallery li.item {
    width: 30%;
    height: 215px;
    display: block;
    float: left;
    margin: 0px 15px 15px 0px;
    font-size: 12px;
    font-weight: normal;
    background-color: d3d3d3;
    padding: 10px;

}
.item img{width: 100%; height: 184px;}

.item p {
    color: #6c6c6c;
    letter-spacing: 1px;
    text-align: center;
    position: relative;
    margin: 5px 0px 0px 0px;
}
</style>
<div class="col-md-9">

                      <section class="panel">
                          <div class="panel-body">
                            <h4 class="pro-d-title">
                                      <a href="#" class="">
                                          Foto Produk
                                      </a>
                                  </h4>
                              <div class="col-lg-12">
                        <div class="row">
                            <ul class="gallery">
                                <?php if(!empty($files)): foreach($files as $file): ?>
                                <li class="item">
                                    <img src="<?php echo base_url('uploads/files/'.$file->foto); ?>" alt="" >
                                   
                                </li>
                                <?php endforeach; else: ?>
                                <p>File(s) not found.....</p>
                                <?php endif; ?>
                            </ul>
                        </div>
                    </div>


                              <div class="col-md-6">
                                <div class="product_meta">
                                  <span class="posted_in"> 
                                <Strong class="pro-d-title">
                                          <a href="#" class="">
                                              <?php 
                                          $i = 1;
                                          if(!empty($files)): foreach($files as $file): ?>
                                              <?php echo $file->nama_produk; ?>
                                              <?php  if ($i++ == 1) break; ?>
                                               <?php endforeach; else: ?>
                                               <p>File(s) not found.....</p>
                                          <?php endif; ?>
                                          </a>
                             </strong>
                           </span>
                              <span class="posted_in"> 
                                  <Strong>
                                          Deskripsi:
                                  </strong>
                                  
                                    <?php 
                                    $i = 1;
                                    if(!empty($files)): foreach($files as $file): ?>
                                      <?php echo $file->deskripsi; ?>
                                      <?php  if ($i++ == 1) break; ?>
                                       <?php endforeach; else: ?>
                                       <p>File(s) not found.....</p>
                                  <?php endif; ?>
                                                
                                  
                                </span>
                              </div>

                                  <div class="product_meta">
                                      <span class="posted_in"> 
                                        <strong>Kategori:</strong> 
                                        
                                          <?php 
                                              $i = 1;
                                              if(!empty($files)): foreach($files as $file): ?>
                                              <?php echo $file->nama_kategori; ?>
                                              <?php  if ($i++ == 1) break; ?>
                                               <?php endforeach; else: ?>
                                               <p>File(s) not found.....</p>
                                          <?php endif; ?>
                                         </span>

                                     

                                      <span class="tagged_as"><strong>Ukuran:</strong> 
                                        <a rel="tag" >
                                        <?php 
                                        $i = 1;
                                        if(!empty($files)): foreach($files as $file): ?>
                                <?php echo $file->panjang; ?>
                                <?php  if ($i++ == 1) break; ?>
                                 <?php endforeach; else: ?>
                                 <p>File(s) not found.....</p>
                            <?php endif; ?>
                                      cm</a> X 
                                      <a rel="tag" >
                                        <?php 
                                        $i = 1;
                                        if(!empty($files)): foreach($files as $file): ?>
                                <?php echo $file->lebar; ?>
                                <?php  if ($i++ == 1) break; ?>
                                 <?php endforeach; else: ?>
                                 <p>File(s) not found.....</p>
                            <?php endif; ?>
                                      cm</a> X 
                                      <a rel="tag" >
                                        <?php 
                                        $i = 1;
                                        if(!empty($files)): foreach($files as $file): ?>
                                <?php echo $file->tinggi; ?>
                                <?php  if ($i++ == 1) break; ?>
                                 <?php endforeach; else: ?>
                                 <p>File(s) not found.....</p>
                            <?php endif; ?>
                                      cm</a> 
                                      </span>

                                      <span class="tagged_as"><strong>Berat:</strong> <a rel="tag" href="#">
                                        <?php 
                                        $i = 1;
                                        if(!empty($files)): foreach($files as $file): ?>
                                <?php echo $file->berat; ?>
                                <?php  if ($i++ == 1) break; ?>
                                 <?php endforeach; else: ?>
                                 <p>File(s) not found.....</p>
                            <?php endif; ?>
                                      ons</a>
                                      </span>

                                      </span> 
                                  </div>
                                 

                                  <div class="m-bot15"> <strong>Harga : </strong>
                                     <span class=""> <a>
                                     <?php 
                                      $i = 1;
                                      if(!empty($files)): foreach($files as $file): ?>
                                          <?php echo "Rp. ".$file->harga; ?>
                                          <?php  if ($i++ == 1) break; ?>
                                           <?php endforeach; else: ?>
                                           <p>File(s) not found.....</p>
                                      <?php endif; ?>
                                    </a>
                                    
                                  </div>

                                  <div class="m-bot15">
                                      <label>Quantity: </label>
                                      <a>
                                      <?php 
                                      $i = 1;
                                      if(!empty($files)): foreach($files as $file): ?>
                                          <?php echo $file->stok; ?>
                                          <?php  if ($i++ == 1) break; ?>
                                           <?php endforeach; else: ?>
                                           <p>File(s) not found.....</p>
                                      <?php endif; ?>
                                    </a>
                                  </div>
                                  </span>

                                  <div class="pull-right">
                                  <p>
                                      <a href="<?php echo base_url();?>produk" class="btn btn-round btn-danger" type="button"><i class="fa fa-shopping-cart"></i> kembali</a>
                                  </p>
                                </div>
                              </div>
                          </div>
                      </section>
