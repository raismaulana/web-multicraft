<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_user extends CI_Model {

	public function tampil(){
		return $this->db->get_where('user', array('hak_akses'=> "1"))->result_object();
	}

	public function tabel($datatabel){
		$this->load->library('table');
		$template = array(
						'table_open' => '<table class="table table-striped">'
					);
		$this->table->set_template($template);
		$this->table->set_heading('No', 'Nama', 'email','No Handphone', 'gender','Detail');

		$no = 1;
		foreach($datatabel as $row){
			$this->table->add_row(
				$no++,
				$row->nama_user,
				$row->email,
				$row->no_hp,
				$row->gender,
				anchor('user/detail/'.$row->id_user, 'Detail', array('class'=>'btn btn-primary'))
			);
		}


		return $this->table->generate();
	}

}

/* End of file model_user.php */
/* Location: ./application/models/model_user.php */