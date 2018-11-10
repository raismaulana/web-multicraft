<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_kategori extends CI_Model {

	public function tampil(){
		return $this->db->get('kategori')->result_object();
	}

	public function tabel($datatabel){
		$this->load->library('table');
		$template = array(
						'table_open' => '<table class="table table-striped table-hover table-bordered" id="editable-sample">'
					);
		$this->table->set_template($template);
		$this->table->set_heading('No', 'ID Kategori', 'Nama Kategori', 'Edit', 'Delete');

		$no = 1;
		foreach($datatabel as $row){
			$this->table->add_row(
				$no++,
				$row->id_kategori,
				$row->nama_kategori,
				anchor('kategori_produk/edit/'.$row->id_kategori, 'Edit', array('class'=>'btn btn-primary')),
				anchor('kategori_produk/hapus/'.$row->id_kategori, 'Delete', array('class'=>'btn btn-danger'))
			);
		}

		return $this->table->generate();
	}

	public function insert($data){
	
		return $this->db->insert('kategori', $data); //proses input kke db
	}


}

/* End of file model_data_produk.php */
/* Location: ./application/models/model_data_produk.php */