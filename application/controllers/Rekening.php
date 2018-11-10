<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rekening extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->library('session');
		$this->load->library('form_validation');
		$this->load->model('model_rekening');

		//ngambil data status di session
		if($this->session->userdata('status') != "login"){
			redirect(base_url("login"));
		}
	}

	public function index()
	{
		$semuadata = $this->model_rekening->tampil();
		 if($semuadata){
		 	$tabel = $this->model_rekening->tabel($semuadata);
		 	$data['tabel'] = $tabel;

		 }else{
		 	$data['tabel'] = "<h2> Oops1! Tidak ada data</h2>";
		 }

		 $data['content'] = 'isi/rekening_produk';
		 $this->load->view('view_dashboard', $data);
	}


	public function rekening_produk_tambah()
	{
		if ($this->input->post('submit')) {
			
			$this->form_validation->set_rules('nama_bank', 'Nama Bank', 'trim|required');
			$this->form_validation->set_rules('nama_pemilik', 'Nama Pemilik', 'trim|required');
			$this->form_validation->set_rules('no_rekening', 'No Rekening', 'trim|required');

			if($this->form_validation->run() === FALSE){
				$data['content'] = 'isi/rekening_produk_tambah';
				$this->load->view('view_dashboard', $data);
			}else{
				$nama_bank = $this->input->post('nama_bank');
				$nama_pemilik = $this->input->post('nama_pemilik');
				$no_rekening = $this->input->post('no_rekening');

				$object = array('nama_bank' => $nama_bank,
					'nama_pemilik'=>$nama_pemilik,
					'no_rekening'=>$no_rekening);

				$query = $this->model_rekening->insert($object);
				if($query){
					$this->session->set_flashdata('info', 'Berhasil di simpan');
					redirect('rekening/rekening_produk_tambah');
				}
			}
		}else{
			$data['data'] = $this->model_rekening->tampil();
			$data['content'] = 'isi/rekening_produk_tambah';
			$this->load->view('view_dashboard', $data);
		}
	}

	public function editrekening($id){
		if($this->input->post('submit')){
			$nama_bank = $this->input->post('nama_bank');
			$nama_pemilik = $this->input->post('nama_pemilik');
			$no_rekening = $this->input->post('no_rekening');

			$object = array('nama_bank' => $nama_bank,
				'nama_pemilik' => $nama_pemilik,
				'no_rekening' => $no_rekening);

			$this->db->where('id_rekening', $id);

			$this->db->update('rekening', $object);

			if($this->db->affected_rows()){
				$this->session->set_flashdata('info', 'Berhasil di update');
				redirect('rekening/rekening_produk');
			}else{
				$this->session->set_flashdata('info', 'Gagal di update!');
			}
		}else{
			$data['content'] = 'isi/rekening_produk_edit';
			$data['editdata'] = $this->db->get_where('rekening', array('id_rekening' => $id))->row();
			$this->load->view('view_dashboard', $data);
		}
	}

	public function hapusrekening($id){
		$this->db->delete('rekening', array('id_rekening'=>$id));
		if($this->db->affected_rows()){
			$this->session->set_flashdata('info', 'Berhasil dihapus');
			redirect('rekening/rekening_produk');
		}else{
			$this->session->set_flashdata('info', 'Gagal dihapus');
			redirect('rekening/rekening_produk');
		}
	}

}

/* End of file Rekening.php */
/* Location: ./application/controllers/Rekening.php */