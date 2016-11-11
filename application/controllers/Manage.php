<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Manage extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if(!isset($_SESSION['user'])){
			header("Location:/login?url=".base64_encode($_SERVER["REQUEST_URI"]));
		}
		$this->load->model('m_manage');
		$this->output->enable_profiler(TRUE);
	}

	public function index()
	{
		$data["test_data"] = $_SERVER["REQUEST_URI"];
		$this->load->view("test", $data);

	}

	
}
