<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_kurir extends CI_Model {

	public function tampil(){
		return $this->db->get('kurir')->result_object();
	}

	public function tabel($datatabel){
		$this->load->library('table');
		$template = array('table_open' =>'<table class = "table table-striped table-hover table-bordered" id="editable-sample">');
		$this->table->set_template($template);
		$this->table->set_heading('No', 'ID Kurir', 'Nama Kurir', 'Edit', 'Delete');

		$no = 1;
		foreach ($datatabel as $row) {
			$this->table->add_row(
				$no++,
				$row->id_kurir,
				$row->nama_kurir,
				anchor('kurir/editkurir/'.$row->id_kurir, 'Edit', array('class' => 'btn btn-primary')),
				anchor('kurir/hapuskurir/'. $row->id_kurir, 'Delete', array('class' => 'btn btn-danger'))
			);
		}

		return $this->table->generate();
	}

	public function insert($data){

		return $this->db->insert('kurir', $data);
	}

}

/* End of file model_kurir.php */
/* Location: ./application/models/model_kurir.php */