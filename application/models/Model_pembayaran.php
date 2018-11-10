<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_pembayaran extends CI_Model {

	public function tampil(){
		return $this->db->get('pembayaran')->result_object();
	}

	public function tabel($datatabel){
		$this->load->library('table');
		$template = array(
						'table_open' => '<table class="table table-striped">'
					);
		$this->table->set_template($template);
		$this->table->set_heading('No', 'Kode Pesanan', 'Tanggal Bayar','Status', 'Detail');

		$no = 1;
		foreach($datatabel as $row){
			$status = $row->status;
			if ($status == 0){
				$data = '<span class="label label-danger label-mini">BARU <i class="icon-asterisk"></i></span>';
			}else{
				$data = '<span class="label label-success label-mini">DONE <i class="icon-check"></i></span>';
			}
			$this->table->add_row(
				$no++,
				$row->checkout_invoice,
				$row->tgl_bayar,
				$data,
				anchor('pembayaran/detail/'.$row->checkout_invoice, 'Detail', array('class'=>'btn btn-primary'))
			);
		}


		return $this->table->generate();
	}

	public function detail($id){
		return $this->db->get_where('pembayaran', array('checkout_invoice'=>$id))->result_object();
	}

}

/* End of file Model_pembayaran.php */
/* Location: ./application/models/Model_pembayaran.php */