<?php
/**
 * 
 */
class Keranjang_model extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}


	public function ambil_id_pesan($id_user)
	{
		$sql = "SELECT * FROM pesan WHERE user_id_user = '$id_user' ORDER BY id_pesan DESC LIMIT 1";
		$query = $this->db->query($sql);
		return $query->row_array();
	}

	public function ambil_data_keranjang($id_pesan)
	{
		$sql = "SELECT pesan.id_pesan, produk.id_produk, detail_pesan.jumlah, detail_pesan.total_harga, detail_pesan.total_berat, produk.nama_produk, produk.harga, produk.berat, produk.stok, foto_produk.foto FROM pesan JOIN detail_pesan ON pesan.id_pesan = detail_pesan.pesan_id_pesan JOIN produk ON detail_pesan.produk_id_produk = produk.id_produk JOIN foto_produk ON produk.id_produk=foto_produk.produk_id_produk WHERE pesan.id_pesan = '$id_pesan' GROUP BY detail_pesan.produk_id_produk";
		return $this->db->query($sql)->result();

	}

	public function ambil_total_harga_pesan($id_pesan)
	{
		$this->db->select('total_harga_pesan');
		$this->db->from('pesan');
		$this->db->where('id_pesan', $id_pesan);
		$query = $this->db->get();
		return $query->result();
	}

	public function update_produk_di_keranjang($id_pesan, $id_produk, $jumlah, $total_harga, $total_berat){
		$sql = "UPDATE `detail_pesan` SET `jumlah` = '$jumlah', `total_harga` = '$total_harga', `total_berat` = '$total_berat'  WHERE produk_id_produk = '$id_produk' AND pesan_id_pesan = '$id_pesan'";
		$this->db->query($sql);

	}	
		
	public function ambil_jumlah($id_pesan, $id_produk)
	{
		$sqlite = "SELECT * FROM detail_pesan WHERE produk_id_produk = '$id_produk' AND pesan_id_pesan = '$id_pesan'";
		$query = $this->db->query($sqlite);
		return $query->result_object();

	}
		
	public function remove_dari_keranjang($id_pesan, $id_produk)
	{
		$sql = "DELETE FROM detail_pesan WHERE produk_id_produk = '$id_produk' AND pesan_id_pesan = '$id_pesan'";
		$query = $this->db->query($sql);
		if ($query){
			return true;
		} else {
			return false;
		}

	}
}
?>