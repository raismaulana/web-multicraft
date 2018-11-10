<?php
/**
 * 
 */
class Detail_produk_model extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}
	public function cek_sudah_belum($id_pesan, $id_produk)
	{
		$sql = "SELECT * FROM detail_pesan WHERE pesan_id_pesan = '$id_pesan' AND produk_id_produk = '$id_produk'";
		$query = $this->db->query($sql);
		if ($query->num_rows() > 0) {
			$row = $query->row_array();
			return $row;
		}

	}
	public function masuk_keranjang($id_pesan, $id_produk, $total_harga, $total_berat){
		$sql = "INSERT INTO detail_pesan (pesan_id_pesan, produk_id_produk, jumlah, total_harga, total_berat) VALUES ('$id_pesan', '$id_produk', '1', $total_harga, $total_berat)";
		$query = $this->db->query($sql);
		if ($query){
			return true;
		} else {
			return false;
		}
	}
	public function input_total_harga_pesan($id_pesan, $total_harga_pesan){
		$this->db->set('total_harga_pesan', $total_harga_pesan);
		$this->db->where('id_pesan', $id_pesan);
		$this->db->update('pesan');
	}
	public function ambil_total_harga_pesan($id_pesan)
	{
		$this->db->select('total_harga_pesan');
		$this->db->from('pesan');
		$this->db->where('id_pesan', $id_pesan);
		$query = $this->db->get();
		return $query->row_array();
	}
	}
?>