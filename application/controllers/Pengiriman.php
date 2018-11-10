<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengiriman extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->library('session');
		$this->load->library('form_validation');
		$this->load->model('model_pengiriman');

		//ngambil data status di session
		if($this->session->userdata('status') != "login"){
			redirect(base_url("login"));
		}
	}

	public function index()
	{
		$semuadata = $this->model_pengiriman->tampil();

		if($semuadata){
			$tabel = $this->model_pengiriman->tabel($semuadata);
			$data['tabel'] = $tabel;
		}else{
			$data['tabel'] = "<h2> Oops! Tidak ada data</h2>";
		}

		$data['content'] = 'isi/pengiriman';
		$this->load->view('view_dashboard', $data);

	}

	public function pengiriman_tambah($id)
	{
		if($this->input->post('submit'))
		{
			$this->form_validation->set_rules('no_resi', 'Nomer Resi', 'trim|required');

			if($this->form_validation->run() === FALSE)
			{
				$data['content'] = 'isi/pengiriman_tambah';
				$this->load->view('view_dashboard', $data);
			}
			else{
				$semuadata = $this->model_pengiriman->get_id($id);

				foreach ($semuadata as $row) {
					$id_bayar = $row->id_bayar;
				}

				$no_resi = $this->input->post('no_resi'); //ambil data dari view

				$object = array ('no_resi' => $no_resi,
								'pembayaran_id_bayar' => $id_bayar
									); //parse ke object

				$query = $this->model_pengiriman->insert($object);
				if($query){
					
					$object = array ('status' => "3");

					$this->db->where('invoice', $id);

					$this->db->update('checkout', $object);

					if ($this->db->affected_rows()) {
						$this->session->set_flashdata('info', 'Berhasil di simpan');
						redirect('pengiriman');	

					}

				}
			}
		}
		else
		{
			$data['content'] = 'isi/pengiriman_tambah';
			$this->load->view('view_dashboard', $data);
		}	
	}

	public function edit($id){

		if($this->input->post('submit')){

			$no_resi = $this->input->post('no_resi'); //ambil data dari view
			$object = array ('no_resi' => $no_resi); //pas\rse ke object

			$this->db->where('id_pengiriman', $id);

			$this->db->update('pengiriman', $object);

			if ($this->db->affected_rows()) 
			{
				$this->session->set_flashdata('info', 'Berhasil  di update!');
				redirect('pengiriman');	
			}
			else
			{
				$this->session->set_flashdata('info', 'gagal  di update!');
				redirect('pengiriman');
		}

		}else{
			$data['content'] = 'isi/pengiriman_edit';
			$data['editdata'] = $this->db->get_where('pengiriman', array('id_pengiriman' => $id))->row();
			$this->load->view('view_dashboard', $data);
		}	
	}

}

/* End of file Pengiriman.php */
/* Location: ./application/controllers/Pengiriman.php */