<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_rekening extends CI_Model {

	public function tampil(){
		return $this->db->get('rekening')->result_object();
	}

	public function tabel($datatabel){
		$this->load->library('table');
		$template = array('table_open' => '<table class="table table-striped table-hover table-bordered" id="editable-sample">');
		$this->table->set_template($template);
		$this->table->set_heading('No', 'ID Rekening', 'Nama Bank', 'Nama Pemilik', 'No Rekening', 'Edit', 'Delete');

		$no = 1;
		foreach ($datatabel as $row) {
			$this->table->add_row(
				$no++,
				$row->id_rekening,
				$row->nama_bank,
				$row->nama_pemilik,
				$row->no_rekening,
				anchor('rekening/editrekening/'.$row->id_rekening, 'Edit', array('class'=>'btn btn-primary')),
				anchor('rekening/hapusrekening/'. $row->id_rekening, 'Delete', array('class'=>'btn btn-danger'))
			);
		}

		return $this->table->generate();
	}

	public function insert($data){

		return $this->db->insert('rekening', $data);
	}
}

/* End of file model_rekening.php */
/* Location: ./application/models/model_rekening.php */