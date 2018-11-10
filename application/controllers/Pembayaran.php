<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pembayaran extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->library('session');
		$this->load->model('model_pembayaran');

		//ngambil data status di session
		if($this->session->userdata('status') != "login"){
			redirect(base_url("login"));
		}
	}

	public function index()
	{
		
		$semuadata = $this->model_pembayaran->tampil();

		if($semuadata){
			$tabel = $this->model_pembayaran->tabel($semuadata);
			$data['tabel'] = $tabel;
		}else{
			$data['tabel'] = "<h2> Oops! Tidak ada data</h2>";
		}
		$data['content'] = 'isi/pembayaran';
		$this->load->view('view_dashboard', $data);
	}

	public function detail($id)
	{


		$data['files']=$this->model_pembayaran->detail($id);
		$data['content'] = 'isi/pembayaran_detail';
		$this->load->view('view_dashboard', $data);
	}

	public function update()
	{
		$id = $this->uri->segment('3');

		$semuadata = $this->db->get_where('pembayaran', array('id_bayar'=>$id))->result_object();
			foreach ($semuadata as $row) {
				$invoice = $row->checkout_invoice;
			}

		$object = array ( 'status' => "1");

		$this->db->where('id_bayar', $id);

		$this->db->update('pembayaran', $object);

		if ($this->db->affected_rows()) {

			
			
			$object = array ('status' => "2");

			$this->db->where('invoice', $invoice);

			$this->db->update('checkout', $object);

			if ($this->db->affected_rows()) {

				$this->session->set_flashdata('info', 'Berhasil  di update!');
				redirect('pembayaran/detail/'.$invoice);
				
			}


		}else{
				$this->session->set_flashdata('info', 'gagal  di update!');
				redirect('pembayaran/detail/'.$invoice);
		}
	}

}

/* End of file Pembayaran.php */
/* Location: ./application/controllers/Pembayaran.php */