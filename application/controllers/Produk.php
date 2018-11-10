<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Produk extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->library('session');
		$this->load->library('form_validation');
		$this->load->model('model_produk');
		$this->load->model('model_kurir');

		//ngambil data status di session
		if($this->session->userdata('status') != "login"){
			redirect(base_url("login"));
		}
	}

	public function index()
	{
		$semuadata = $this->model_produk->tampil_produk();

		if($semuadata){
			$tabel = $this->model_produk->tabel_produk($semuadata);
			$data['tabel'] = $tabel;
		}else{
			$data['tabel'] = "<h2> Oops! Tidak ada data</h2>";
		}

		$data['content'] = 'isi/produk';
		$this->load->view('view_dashboard', $data);
	}



	public function produk_tambah(){
		if($this->input->post('fileSubmit') ){
			

			$this->form_validation->set_rules('kategori_id_kategori', 'ID Kategori', 'trim|required');
			$this->form_validation->set_rules('kode_produk', 'Kode Produk', 'trim|required');
			$this->form_validation->set_rules('nama_produk', 'Nama Produk', 'trim|required');
			$this->form_validation->set_rules('harga', 'Harga', 'trim|required');
			$this->form_validation->set_rules('panjang', 'Panjang', 'trim|required');
			$this->form_validation->set_rules('lebar', 'Lebar', 'trim|required');
			$this->form_validation->set_rules('tinggi', 'Tinggi', 'trim|required');
			$this->form_validation->set_rules('berat', 'Berat', 'trim|required');
			$this->form_validation->set_rules('stok', 'Stok', 'trim|required');
			$this->form_validation->set_rules('deskripsi', 'Deskripsi', 'trim|required');

			if($this->form_validation->run() === FALSE){
				$data['content'] = 'isi/produk_tambah';
				$this->load->view('view_dashboard', $data);
			}
			else{
				$id_kategori = $this->input->post('kategori_id_kategori');
				$kode_produk = $this->input->post('kode_produk'); //ambil data dari view
				$nama_produk = $this->input->post('nama_produk'); 
				$harga = $this->input->post('harga'); 
				$panjang = $this->input->post('panjang'); 
				$lebar = $this->input->post('lebar'); 
				$tinggi = $this->input->post('tinggi'); 
				$berat = $this->input->post('berat'); 
				$stok = $this->input->post('stok');
				$deskripsi = $this->input->post('deskripsi');

				

				$object = array ( 'kategori_id_kategori' => $id_kategori,
								  'kode_produk' => $kode_produk,
								 'nama_produk' => $nama_produk,
								 'harga' => $harga,
								 'panjang' => $panjang,
								 'lebar' => $lebar,
								 'tinggi' => $tinggi,
								 'berat' => $berat,
								 'stok' => $stok,
								 'deskripsi' => $deskripsi
								); //pas\rse ke object

				
				
				$query = $this->model_produk->insert_produk($object);
				if($query){
					$this->session->set_flashdata('info', 'Berhasil di simpan');
					redirect('upload_files');

				}else{
					$this->session->set_flashdata('info', 'gagal');
					redirect('produk/produk_tambah');
				}
			}

		}
		else{
			//$data['id'] = $this->db->get_where('kategori', array('id_kategori' => $id))->row();
			$data['id'] = $this->model_produk->data_kategori();
			$data['data']	 = $this->model_produk->tampil_produk();

			$data['content'] = 'isi/produk_tambah';
			$this->load->view('view_dashboard', $data);
		}
	}

	public function hapus_produk($id){	
		$finish = $this->db->delete('foto_produk', array('produk_id_produk'=>$id));
		if($finish){
			$this->db->delete('produk', array('id_produk'=>$id));

			if ($this->db->affected_rows()) {
				$this->session->set_flashdata('info', 'Berhasil  dihapus!');
				redirect('produk');	
			}
			else{
				$this->session->set_flashdata('info', 'gagal  dihapus!');
				redirect('produk');
			}
		}
		
	}

	public function edit_produk($id){

		if($this->input->post('fileSubmit')){

			$id_kategori = $this->input->post('kategori_id_kategori');
			$kode_produk = $this->input->post('kode_produk'); //ambil data dari view
			$nama_produk = $this->input->post('nama_produk'); 
			$harga = $this->input->post('harga'); 
			$panjang = $this->input->post('panjang'); 
			$lebar = $this->input->post('lebar'); 
			$tinggi = $this->input->post('tinggi'); 
			$berat = $this->input->post('berat'); 
			$stok = $this->input->post('stok');
			$deskripsi = $this->input->post('deskripsi'); //ambil data dari view

			$object = array ( 'kategori_id_kategori' => $id_kategori,
								  'kode_produk' => $kode_produk,
								 'nama_produk' => $nama_produk,
								 'harga' => $harga,
								 'panjang' => $panjang,
								 'lebar' => $lebar,
								 'tinggi' => $tinggi,
								 'berat' => $berat,
								 'stok' => $stok,
								 'deskripsi' => $deskripsi,
								 'created' =>  date("Y-m-d H:i:s")
								); //pas\rse ke object

			$this->db->where('id_produk', $id);

			$this->db->update('produk', $object);

			if ($this->db->affected_rows()) {
				$this->session->set_flashdata('info', 'Berhasil  di update!');
				redirect('upload_files/edit_file');	
			}
			else{
				$this->session->set_flashdata('info', 'gagal  di edit!');
				redirect('produk/edit_produk');
		}

		}else{
			$data['id'] = $this->model_produk->data_kategori();
			$data['content'] = 'isi/produk_edit';
			$data['editdata'] = $this->db->get_where('produk', array('id_produk' => $id))->row();
			$this->load->view('view_dashboard', $data);
		}
		
	}


	public function cetak(){
		$this->load->model('model_produk');
		$this->load->view('detail');
		$html = $this->output->get_output();
		$this->load->library('dompdf_gen');
		$this->dompdf->load_html($html);
		$this->dompdf->render();
		$this->dompdf->stream("detail" . ".pdf", array('Attachment' => 0));
	}

//------------------------------------Detail Produk---------------------------------------------


public function detail($id){	
		$semuadata = $this->db->get_where('detail_produk', array('id_produk'=>$id))->result_object();

		if($semuadata){
			$data['files'] = $semuadata;
		}else{
			$data['tabel'] = "<h2> Oops! Tidak ada data</h2>";
		}
		$data['content'] = 'isi/produk_detail';
		$this->load->view('view_dashboard', $data);

		
	}

//------------------------------------Detail Produk---------------------------------------------

}

/* End of file Produk.php */
/* Location: ./application/controllers/Produk.php */