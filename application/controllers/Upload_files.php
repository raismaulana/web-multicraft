<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Upload_Files extends CI_Controller
{
	function  __construct() {
		parent::__construct();
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->library('session');
		$this->load->library('form_validation');
		$this->load->model('model_produk');

		//ngambil data status di session
		if($this->session->userdata('status') != "login"){
			redirect(base_url("login"));
		}
	}
	
	function index(){
		$data = array();
		if($this->input->post('fileSubmit') && !empty($_FILES['userFiles']['name'])){
			$filesCount = count($_FILES['userFiles']['name']);
			for($i = 0; $i < $filesCount; $i++){
				$_FILES['userFile']['name'] = $_FILES['userFiles']['name'][$i];
				$_FILES['userFile']['type'] = $_FILES['userFiles']['type'][$i];
				$_FILES['userFile']['tmp_name'] = $_FILES['userFiles']['tmp_name'][$i];
				$_FILES['userFile']['error'] = $_FILES['userFiles']['error'][$i];
				$_FILES['userFile']['size'] = $_FILES['userFiles']['size'][$i];

				$uploadPath = 'uploads/files/';
				$config['upload_path'] = $uploadPath;
				$config['allowed_types'] = 'gif|jpg|jpeg|png';
				//$config['max_size']	= '100';
				//$config['max_width'] = '1024';
				//$config['max_height'] = '768';
				$select = $this->db->query('SELECT * FROM produk ORDER BY id_produk DESC LIMIT 1');
				$id_prdk = $select->row_array();
				$id_produk = $id_prdk['id_produk'];
				
				$this->load->library('upload', $config);
				$this->upload->initialize($config);
				if($this->upload->do_upload('userFile')){
					$fileData = $this->upload->data();
					$uploadData[$i]['foto'] = $fileData['file_name'];
					$uploadData[$i]['created_foto'] = date("Y-m-d H:i:s");
					$uploadData[$i]['produk_id_produk'] = $id_produk;
					
				}
			}
			if(!empty($uploadData)){
				//Insert files data into the database
				$insert = $this->model_produk->insert_img($uploadData);
				$statusMsg = $insert?'Files uploaded successfully.':'Some problem occurred, please try again.';
				$this->session->set_flashdata('statusMsg',$statusMsg);
				if($insert){
				
					$select = $this->db->query('SELECT * FROM produk ORDER BY id_produk DESC LIMIT 1');
					$id_prdk = $select->row_array();
					$id_produk = $id_prdk['id_produk'];
					$id = $this->model_produk->getRows($id_produk);
					//pass the files data to view
					$data['files'] = $id;
					$data['content'] = 'upload_files/index';
					$this->load->view('view_dashboard', $data);
				}
			}
		}else{
			$data['content'] = 'upload_files/index';
			$this->load->view('view_dashboard', $data);
		}
		

	}

	public function edit_file(){
			$data = array();
			if($this->input->post('fileSubmit') && !empty($_FILES['userFiles']['name'])){
				$filesCount = count($_FILES['userFiles']['name']);
				for($i = 0; $i < $filesCount; $i++){
					$_FILES['userFile']['name'] = $_FILES['userFiles']['name'][$i];
					$_FILES['userFile']['type'] = $_FILES['userFiles']['type'][$i];
					$_FILES['userFile']['tmp_name'] = $_FILES['userFiles']['tmp_name'][$i];
					$_FILES['userFile']['error'] = $_FILES['userFiles']['error'][$i];
					$_FILES['userFile']['size'] = $_FILES['userFiles']['size'][$i];

					$uploadPath = 'uploads/files/';
					$config['upload_path'] = $uploadPath;
					$config['allowed_types'] = 'gif|jpeg|jpg|png';
					//$config['max_size']	= '100';
					//$config['max_width'] = '1024';
					//$config['max_height'] = '768';
					$select = $this->db->query('SELECT * FROM produk ORDER BY created_produk DESC LIMIT 1');
					$id_prdk = $select->row_array();
					$id_produk = $id_prdk['id_produk'];
					
					$this->load->library('upload', $config);
					$this->upload->initialize($config);
					if($this->upload->do_upload('userFile')){
						$fileData = $this->upload->data();
						$uploadData[$i]['foto'] = $fileData['file_name'];
						$uploadData[$i]['created_foto'] = date("Y-m-d H:i:s");
						$uploadData[$i]['produk_id_produk'] = $id_produk;
						
					}
				}
				$this->db->delete('foto_produk', array ('produk_id_produk'=>$id_produk));
				if(!empty($uploadData)){
					//Insert files data into the database
						$insert = $this->model_produk->insert_img($uploadData);
					
						$statusMsg = $insert?'Files uploaded successfully.':'Some problem occurred, please try again.';
						$this->session->set_flashdata('statusMsg',$statusMsg);
					
					
				}
			}
			
				$select = $this->db->query('SELECT * FROM produk ORDER BY created_produk DESC LIMIT 1');
				$id_prdk = $select->row_array();
				$id_produk = $id_prdk['id_produk'];
				$id = $this->model_produk->getRows($id_produk);
				//pass the files data to view
				$data['files'] = $id;
				$data['content'] = 'upload_files/edit_file';
				$this->load->view('view_dashboard', $data);
			
		}

}
