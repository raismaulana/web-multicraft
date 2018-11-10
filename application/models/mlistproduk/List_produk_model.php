<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * 
 */
class List_produk_model extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->database();

	}

	public function ambil_produk($id_kategori)
	{
		$sql = "SELECT id_produk, nama_produk, harga, panjang, lebar, tinggi, berat, deskripsi, foto, stok
		FROM produk, foto_produk, kategori
		WHERE produk.id_produk = foto_produk.produk_id_produk AND produk.kategori_id_kategori = '$id_kategori' GROUP BY produk.id_produk";

		return $this->db->query($sql)->result();
	}


}
?>