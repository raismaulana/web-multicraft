<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * 
 */
class Checkout_model extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->database();

	}

	public function ambil_berat($id_pesan)
	{
		$sql = "SELECT SUM(total_berat) FROM `detail_pesan` WHERE pesan_id_pesan = $id_pesan";
		$query = $this->db->query($sql);
		return $query->row_array();
	}

	public function insert_check_out($data)
	{
		$this->db->insert('checkout', $data);
	}

}
?>