<?php
class Dashboard extends CI_Controller {

function __construct(){
		parent::__construct();
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->library('session');
		$this->load->library('form_validation');
		$this->load->model('model_data_produk');

		//ngambil data status di session
		if($this->session->userdata('status') != "login"){
			redirect(base_url("login"));
		}
	}
	public function index()
	{
		$data['content'] = 'content';
		$this->load->view('view_dashboard', $data);
	}

	public function hapus($id)
	{	
		$this->db->delete('kategori', array('id_kategori'=>$id));
		if ($this->db->affected_rows()) 
		{
			$this->session->set_flashdata('info', 'Berhasil  dihapus!');
			redirect('dashboard/kategori_produk');	
		}
		else
		{
			$this->session->set_flashdata('info', 'gagal  dihapus!');
			redirect('site');
		}
	}

	public function kategori_produk()
	{
		$semuadata = $this->model_data_produk->tampil();

		if($semuadata){
			$tabel = $this->model_data_produk->tabel($semuadata);
			$data['tabel'] = $tabel;
		}else{
			$data['tabel'] = "<h2> Oops! Tidak ada data</h2>";
		}


		$data['content'] = 'isi/kategori_produk';
		$this->load->view('view_dashboard', $data);

	}

	public function tambah_kategori_produk()
	{
		if($this->input->post('submit'))
		{
			$this->form_validation->set_rules('nama_kategori', 'Nama Kategori', 'trim|required');

			if($this->form_validation->run() === FALSE)
			{
				$data['content'] = 'isi/tambah_kategori_produk';
				$this->load->view('view_dashboard', $data);
			}
			else
			{
				$nama_kategori = $this->input->post('nama_kategori'); //ambil data dari view

				$object = array ('nama_kategori' => $nama_kategori); //pas\rse ke object

				$query = $this->model_data_produk->insert($object);
				if($query){
					$this->session->set_flashdata('info', 'Berhasil di simpan');
					redirect('dashboard/tambah_kategori_produk');
				}
			}
		}
		else
		{
			$data['data']	 = $this->model_data_produk->tampil();
			$data['content'] = 'isi/tambah_kategori_produk';
			$this->load->view('view_dashboard', $data);
		}
	
		
	}

	public function produk()
	{
		$data['content'] = 'isi/produk';
		$this->load->view('view_dashboard', $data);
	}

	public function tes()
	{
		$data['content'] = 'isi/tes';
		$this->load->view('view_dashboard', $data);
	}


}
