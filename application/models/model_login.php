<?php
class Model_login extends CI_Model{
	public function login($username, $password)
	{
		$this->db->select('nama_user, password, hak_akses'); //memilih kolom di tabel
		$this->db->from('user'); //nama tabel
		$this->db->where('nama_user', $username); //dimana username = $username
		$this->db->where('password', $password); //dimana password= $password
		$this->db->limit(1); //jumlah data baris yg di ambil

		$query = $this->db->get();//mengambil proses di atas

		if($query->num_rows()==1){ //cek data ada atau tidak
			return $query->result();
		}else{
			return false;
		}
	}
}	