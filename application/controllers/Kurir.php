<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kurir extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->library('session');
		$this->load->library('form_validation');
		$this->load->model('model_kurir');

		//ngambil data status di session
		if($this->session->userdata('status') != "login"){
			redirect(base_url("login"));
		}
	}

	public function index()
	{
		$semuadata = $this->model_kurir->tampil();
		 if($semuadata){
		 	$tabel = $this->model_kurir->tabel($semuadata);
		 	$data['tabel'] = $tabel;

		 }else{
		 	$data['tabel'] = "<h2> Oops1! Tidak ada data</h2>";
		 }

		 $data['content'] = 'isi/kurir_produk';
		 $this->load->view('view_dashboard', $data);
	}


	public function kurir_produk_tambah()
	{
		if ($this->input->post('submit')) {
			
			$this->form_validation->set_rules('nama_kurir', 'Nama Kurir', 'trim|required');

			if($this->form_validation->run() === FALSE)
			{
				$data['content'] = 'isi/kurir_produk_tambah';
				$this->load->view('view_dashboard', $data);
			}else{
				$nama_kurir = $this->input->post('nama_kurir');
				
				$object = array('nama_kurir' => $nama_kurir);

				$query = $this->model_kurir->insert($object);
				if($query){
					$this->session->set_flashdata('info', 'Berhasil di simpan');
					redirect('kurir/kurir_produk_tambah');
				}
			}
		}else{
			$data['data'] = $this->model_kurir->tampil();
			$data['content'] = 'isi/kurir_produk_tambah';
			$this->load->view('view_dashboard', $data);
		}
	}

	public function editkurir($id){
		if($this->input->post('submit')){
			$nama_kurir = $this->input->post('nama_kurir');

			$object = array('nama_kurir' => $nama_kurir);

			$this->db->where('id_kurir', $id);

			$this->db->update('kurir', $object);

			if($this->db->affected_rows()){
				$this->session->set_flashdata('info', 'Berhasil di update');
				redirect('kurir');
			}else{
				$this->session->set_flashdata('info', 'Gagal di update!');
			}
		}else{
			$data['content'] = 'isi/kurir_produk_edit';
			$data['editdata'] = $this->db->get_where('kurir', array('id_kurir' => $id))->row();
			$this->load->view('view_dashboard', $data);
		}
	}

	public function hapuskurir($id){
		$this->db->delete('kurir', array('id_kurir'=>$id));
		if($this->db->affected_rows()){
			$this->session->set_flashdata('info', 'Berhasil dihapus');
			redirect('kurir');
		}else{
			$this->session->set_flashdata('info', 'Gagal dihapus');
			redirect('kurir');
		}	
	}

}

/* End of file Kurir.php */
/* Location: ./application/controllers/Kurir.php */