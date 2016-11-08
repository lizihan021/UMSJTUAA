<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_login');
		$this->load->helper('url');
		$this->output->enable_profiler(TRUE);
	}

	public function index()
	{


	}
}
