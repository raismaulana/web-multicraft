<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_pengiriman extends CI_Model {

	public function tampil(){
		return $this->db->get('pengiriman')->result_object();
	}

	public function tabel($datatabel){
		$this->load->library('table');
		$template = array(
						'table_open' => '<table class="table table-striped">'
					);
		$this->table->set_template($template);
		$this->table->set_heading('No', 'Kode Bayar', 'No Resi','Edit');

		$no = 1;
		foreach($datatabel as $row){
			$this->table->add_row(
				$no++,
				$row->pembayaran_id_bayar,
				$row->no_resi,
				anchor('pengiriman/edit/'.$row->id_pengiriman, 'EDIT', array('class'=>'btn btn-primary'))
			);
		}


		return $this->table->generate();
	}

	public function detail($id){
		return $this->db->get_where('pembayaran', array('checkout_invoice'=>$id))->result_object();
	}

	public function get_id($id)
	{
		$sql = "SELECT pembayaran.id_bayar, pembayaran.checkout_invoice FROM pembayaran JOIN checkout ON pembayaran.checkout_invoice = '$id' ";
		return $this->db->query($sql)->result_object();
	}

	public function insert($data){
	
		return $this->db->insert('pengiriman', $data); //proses input kke db
	}

}

/* End of file Model_pengiriman.php */
/* Location: ./application/models/Model_pengiriman.php */