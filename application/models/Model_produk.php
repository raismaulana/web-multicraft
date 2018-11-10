<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_produk extends CI_Model {

	public function view_produk($kode_produk){
		$query = $this->db->query("SELECT * FROM 'produk' where kode_produk='$kode_produk' LIMIT 1");
		return $query->result_array();
	}
	
	public function tampil_produk(){
		return $this->db->get('produk')->result_object();
	}

	public function tabel_produk($datatabel){
		$this->load->library('table');
		$template = array(
						'table_open' => '<table class="table table-striped table-hover table-bordered" id="editable-sample">'
					);

		$this->table->set_template($template);
		$this->table->set_heading('No', 'Kode', 'Nama Produk','Harga','stok','Aksi');

		$no = 1;
		foreach($datatabel as $row){
			$this->table->add_row(
				$no++,
				$row->kode_produk,
				$row->nama_produk,
				"Rp.$row->harga",
				$row->stok,
				anchor('produk/detail/'.$row->id_produk, 'Detail', array('class'=>'btn btn-success')).''.
				anchor('produk/edit_produk/'.$row->id_produk, 'Edit', array('class'=>'btn btn-primary')).''.
				anchor('produk/hapus_produk/'.$row->id_produk, 'Delete', array('class'=>'btn btn-danger'))
				
			);
		}

		return $this->table->generate();
	}

	public function insert_produk($data){
			return $this->db->insert('produk', $data); //proses input kke db
	}

	public function insert_img($data = array()){
		$insert = $this->db->insert_batch('foto_produk',$data);
		return $insert?true:false;
	}

	
	public function getRows($id){
		$this->db->select('produk_id_produk,foto');
		$this->db->from('foto_produk');
		$this->db->where('produk_id_produk', $id);
			$this->db->order_by('produk_id_produk','desc');
			$query = $this->db->get();
			$result = $query->result_object();
		return !empty($result)?$result:false;
	}
		
	

	public function data_kategori(){
		$query = $this->db->query('SELECT * FROM kategori');
        return $query->result();
	}

	public function dataid(){
		$query = $this->db->query('SELECT * FROM produk');
        return $query->result();
	}

//--------------------------------Detail Produk-----------------------------------
	public function detail_produk(){
			return $this->db->get('detail_produk')->result_object();
	}

	
	public function detail_tabel_produk($datatabel){
		$this->load->library('table');
		$template = array(
						'table_open' => '<table class="table table-striped table-hover table-bordered" id="editable-sample">'
					);

		$this->table->set_template($template);
		$this->table->set_heading('No', 'Kode', 'Nama Produk','Harga','Panjang','lebar','tinggi','berat','deskripsi','stok','Detail');

		$no = 1;
		$i= 1;
		foreach($datatabel as $row){
			$this->table->add_row(
				$no++,
				$row->kode_produk,
				$row->nama_produk,
				"Rp. $row->harga",
				"$row->panjang cm",
				"$row->lebar cm" ,
				"$row->tinggi cm",
				"$row->berat ons",
				$row->deskripsi,
				$row->stok,
				'<img src="/web-multicraft/uploads/files/'.$row->foto .'?>" width="120px" height="100px"/>'
			);
			//if ($i++ == 1) break;
			
		}

		return $this->table->generate();
	}

}

/* End of file Model_produk.php */
/* Location: ./application/models/Model_produk.php */