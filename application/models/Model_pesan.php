<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_pesan extends CI_Model {


	public function tampil(){
		$sql = 'SELECT checkout.invoice, user.nama_user, checkout.total_pembayaran,checkout.tgl_checkout , checkout.status FROM user JOIN pesan on pesan.user_id_user = user.id_user JOIN checkout ON pesan.id_pesan = checkout.pesan_id_pesan ';
		return $this->db->query($sql)->result_object();
	}

	public function tabel($datatabel){
		$this->load->library('table');
		$template = array(
						'table_open' => '<table class="table table-striped table-advance table-hover">'
					);
		$this->table->set_template($template);
		$this->table->set_heading('No', '<i class="icon-key"></i>Kode Pesan', '<i class="icon-user"></i>Nama Pemesan', '<i class="icon-money"></i>Total Bayar', '<i class="icon-calendar"></i>Tanggal pesan', '<i class="icon-check"></i>Status', '<i class="icon-bookmark"></i>Detail', '<i class="icon-bookmark"></i>Pembayaran', '<i class="icon-bookmark"></i>pengiriman');

		$no = 1;
		foreach($datatabel as $row){
			$status = $row->status;
			if ($status == 0){
				$data = '<span class="label label-danger label-mini">belum bayar</span>';
			}elseif($status == 1){
				$data = '<span class="label label-primary label-mini">sudah bayar</span>';
			}else{
				$data = '<span class="label label-success label-mini">pengiriman</span>';
			}
			$this->table->add_row(
				$no++,
				$row->invoice,
				$row->nama_user,
				$row->total_pembayaran,
				$row->tgl_checkout,
				$data,
				anchor('pesan/detail/'.$row->invoice, 'Detail', array('class'=>'btn btn-danger')),
				anchor('pembayaran/detail/'.$row->invoice, 'Pembayaran', array('class'=>'btn btn-primary')),
				anchor('pengiriman/pengiriman_tambah/'.$row->invoice, 'Pengiriman', array('class'=>'btn btn-success'))

				
			);
		}

		return $this->table->generate();
	}

	public function tampil_detail($id)
	{
		$sql =" SELECT checkout.invoice, checkout.nama_penerima, checkout.biaya_pengiriman, checkout.total_pembayaran, checkout.alamat_penerima, checkout.no_hp_penerima, checkout.status, produk.nama_produk, produk.harga, detail_pesan.jumlah, detail_pesan.total_harga FROM checkout JOIN pesan ON pesan.id_pesan = checkout.pesan_id_pesan JOIN detail_pesan ON detail_pesan.pesan_id_pesan = pesan.id_pesan JOIN produk ON produk.id_produk = detail_pesan.produk_id_produk WHERE checkout.invoice = '$id' ";
		return $this->db->query($sql)->result_object();
	}
	
	public function tabel_detail($datatabel){
		$this->load->library('table');
		$template = array(
						'table_open' => '<table class="table table-bordered">'
					);
		$this->table->set_template($template);
		$this->table->set_heading('No','Nama Produk', 'Jumlah', 'Harga', 'Total Harga' );

		$no = 1;
		foreach($datatabel as $row){
			$this->table->add_row(
				$no++,
				$row->nama_produk,
				$row->jumlah,
				$row->harga,
				$row->total_harga
			);
		}

		return $this->table->generate();
	}

}

/* End of file model_pesan.php */
/* Location: ./application/models/model_pesan.php */