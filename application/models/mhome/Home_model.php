<?php
/**
 * 
 */
class Home_model extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function select_kategori(){
		$this->db->select('*');
		$this->db->from('kategori');
		$query = $this->db->get();

		return $query->result();
	}
}
?>