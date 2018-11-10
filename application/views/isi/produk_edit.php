<div class="col-lg-12">
  <section class="panel">
    <header class="panel-heading">
          Tambah Data Produk
      </header>
        <div class="panel-body">

          <div class="">
              <div class="text-center"> <?php echo $this->session->flashdata('info'); ?></div>
          </div>
          <div class="col-lg-12">
                <p><?php echo $this->session->flashdata('statusMsg'); ?></p>
            </div>

          <?php echo form_open(); ?>
          <?php echo validation_errors(); ?>

          <div class="form-group">
            <label >Kategori Produk</label>
            <select name="kategori_id_kategori" class="form-control" >
              <?php 
              foreach($id as $row){ 
                echo '<option value="'.$row->id_kategori.'">'.$row->nama_kategori.'</option>';
              }
              ?>
            </select>
          </div>

          <div class="form-group">
              <label >Kode Produk</label>
              <input name="kode_produk" type="" class="form-control"  placeholder="Kode Produk" value="<?php echo $editdata->kode_produk; ?>">
          </div>

          <div class="form-group">
              <label>Nama Produk</label>
              <input name="nama_produk" type="" class="form-control"  placeholder="Nama Produk" value="<?php echo $editdata->nama_produk; ?>">
          </div>

          <div class="form-group">
          <label>Harga</label>
            <div class="input-group m-bot15">
              <span class="input-group-addon">Rp</span>
              <input name="harga" type="text" class="form-control" placeholder="100000" value="<?php echo $editdata->harga; ?>">
            </div>
          </div>

          <div class="form-group">
          <label>Ukuran</label>
            <div class="row">
                <div class="col-lg-2">
                  <div class="input-group m-bot15">
                    <input name="panjang" type="text" class="form-control" placeholder="panjang" value="<?php echo $editdata->panjang; ?>">
                    <span class="input-group-addon">cm</span>
                  </div>
                </div>
                <div class="col-lg-2">
                  <div class="input-group m-bot15">
                    <input name="lebar" type="text" class="form-control" placeholder="lebar" value="<?php echo $editdata->lebar; ?>">
                    <span class="input-group-addon">cm</span>
                  </div>
                </div> 
                <div class="col-lg-2">
                  <div class="input-group m-bot15"> 
                    <input name="tinggi" type="text" class="form-control" placeholder="tinggi" value="<?php echo $editdata->tinggi; ?>">
                    <span class="input-group-addon">cm</span>
                  </div>
                </div>                                
            </div>
          </div>

          <div class="form-group">
          <label>Berat</label>
            <div class="input-group m-bot15">
              <input name="berat" type="text" class="form-control" placeholder="100" value="<?php echo $editdata->berat; ?>">
              <span class="input-group-addon">ons</span>
            </div>
          </div>
          <div class="form-group">
              <label>Stok</label>
              <input name="stok" type="" class="form-control"  placeholder="100" value="<?php echo $editdata->stok; ?>">
          </div>
          <div class="form-group">
            <label>Deskripsi</label>
            <textarea name="deskripsi" class="form-control" value="<?php echo $editdata->deskripsi; ?>"></textarea>
          </div>

          <input class="form-control btn btn-info" type="submit" name="fileSubmit" value="UPLOAD"/>
               
         
          <?php echo form_close(); ?>

        </div>
  </section>
</div>