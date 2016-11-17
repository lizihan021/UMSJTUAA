<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Manage extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if(!isset($_SESSION['user'])){
			header("Location:/login?url=".base64_encode($_SERVER["REQUEST_URI"]));
		}
		require 'lib/FroalaEditor.php';
		$this->load->model('m_manage');
		$this->output->enable_profiler(TRUE);
	}

	public function index()
	{
		$data["page_name"] = substr($_SERVER["REQUEST_URI"], 1, strlen($_SERVER["REQUEST_URI"]));
		$data["discription"] = $data["page_name"];
		$this->load->view("manage", $data);
		echo $_SERVER['DOCUMENT_ROOT'];
	}

	public function upload_image()
	{

		try {
  			$response = FroalaEditor_Image::upload('/uploads/');
 			echo stripslashes(json_encode($response));
		}
		catch (Exception $e) {
  			http_response_code(404);
		}
	}
/*
	public function delete_image()
	{
		try {
			$response = FroalaEditor_Image::delete($_POST['src']);
  			echo stripslashes(json_encode('Success'));
		}
		catch (Exception $e) {
  			http_response_code(404);
		}
	}
*/
}
