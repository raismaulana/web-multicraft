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
              <input name="kode_produk" type="" class="form-control"  placeholder="Kode Produk">
          </div>

          <div class="form-group">
              <label>Nama Produk</label>
              <input name="nama_produk" type="" class="form-control"  placeholder="Nama Produk">
          </div>

          <div class="form-group">
          <label>Harga</label>
            <div class="input-group m-bot15">
              <span class="input-group-addon">Rp</span>
              <input name="harga" type="text" class="form-control" placeholder="100000">
            </div>
          </div>

          <div class="form-group">
          <label>Ukuran</label>
            <div class="row">
                <div class="col-lg-2">
                  <div class="input-group m-bot15">
                    <input name="panjang" type="text" class="form-control" placeholder="panjang">
                    <span class="input-group-addon">cm</span>
                  </div>
                </div>
                <div class="col-lg-2">
                  <div class="input-group m-bot15">
                    <input name="lebar" type="text" class="form-control" placeholder="lebar">
                    <span class="input-group-addon">cm</span>
                  </div>
                </div> 
                <div class="col-lg-2">
                  <div class="input-group m-bot15">
                    <input name="tinggi" type="text" class="form-control" placeholder="tinggi">
                    <span class="input-group-addon">cm</span>
                  </div>
                </div>                                
            </div>
          </div>

          <div class="form-group">
          <label>Berat</label>
            <div class="input-group m-bot15">
              <input name="berat" type="text" class="form-control" placeholder="100">
              <span class="input-group-addon">ons</span>
            </div>
          </div>
          <div class="form-group">
              <label>Stok</label>
              <input name="stok" type="" class="form-control"  placeholder="100">
          </div>
          <div class="form-group">
            <label>Deskripsi</label>
            <textarea name="deskripsi" class="form-control ckeditor" ></textarea>
          </div>

         
                
                      
          
          <input class="form-control btn btn-info" type="submit" name="fileSubmit" value="UPLOAD"/>
               
         
          <?php echo form_close(); ?>

        </div>
  </section>
</div>