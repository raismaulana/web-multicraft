<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kategori_produk extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->library('session');
		$this->load->library('form_validation');
		$this->load->model('model_kategori');
		

		//ngambil data status di session
		if($this->session->userdata('status') != "login"){
			redirect(base_url("login"));
		}
	}

	public function index()
	{
		$semuadata = $this->model_kategori->tampil();

		if($semuadata){
			$tabel = $this->model_kategori->tabel($semuadata);
			$data['tabel'] = $tabel;
		}else{
			$data['tabel'] = "<h2> Oops! Tidak ada data</h2>";
		}
		$data['content'] = 'isi/kategori_produk';
		$this->load->view('view_dashboard', $data);
	}

	public function hapus($id)
	{	
		$this->db->delete('kategori', array('id_kategori'=>$id));
		if ($this->db->affected_rows()) 
		{
			$this->session->set_flashdata('info', 'Berhasil  dihapus!');
			redirect('kategori_produk');	
		}
		else
		{
			$this->session->set_flashdata('info', 'gagal  dihapus!');
			redirect('kategori_produk');
		}
	}
	public function edit($id){

		if($this->input->post('submit')){
			$nama_kategori = $this->input->post('nama_kategori'); //ambil data dari view
			$object = array ('nama_kategori' => $nama_kategori); //pas\rse ke object

			$this->db->where('id_kategori', $id);

			$this->db->update('kategori', $object);

			if ($this->db->affected_rows()) 
			{
				$this->session->set_flashdata('info', 'Berhasil  di update!');
				redirect('kategori_produk');	
			}
			else
			{
				$this->session->set_flashdata('info', 'gagal  di update!');
				redirect('kategori_produk');
		}

		}else{
			$data['content'] = 'isi/kategori_produk_edit';
			$data['editdata'] = $this->db->get_where('kategori', array('id_kategori' => $id))->row();
			$this->load->view('view_dashboard', $data);
		}	
	}
	
	public function kategori_produk_tambah()
	{
		if($this->input->post('submit'))
		{
			$this->form_validation->set_rules('nama_kategori', 'Nama Kategori', 'trim|required');

			if($this->form_validation->run() === FALSE)
			{
				$data['content'] = 'isi/kategori_produk_tambah';
				$this->load->view('view_dashboard', $data);
			}
			else
			{
				$nama_kategori = $this->input->post('nama_kategori'); //ambil data dari view

				$object = array ('nama_kategori' => $nama_kategori); //parse ke object

				$query = $this->model_kategori->insert($object);
				if($query){
					$this->session->set_flashdata('info', 'Berhasil di simpan');
					redirect('kategori_produk/kategori_produk_tambah');
				}
			}
		}
		else
		{
			$data['data']	 = $this->model_kategori->tampil();
			$data['content'] = 'isi/kategori_produk_tambah';
			$this->load->view('view_dashboard', $data);
		}	
	}
}

/* End of file Kategori_produk.php */
/* Location: ./application/controllers/Kategori_produk.php */