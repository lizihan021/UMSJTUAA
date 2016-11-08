<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Manage extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_manage');
		$this->load->helper('url');
		$this->output->enable_profiler(TRUE);
	}

	public function index()
	{
		$data["test_data"] = "yo!";
		$this->load->view("test", $data);

	}
}
