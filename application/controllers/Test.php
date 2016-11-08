<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Test extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_db');
		$this->load->helper('url');
		$this->output->enable_profiler(TRUE);
	}

	public function index()
	{

		$data['site_name'] = $this->m_db->get_site_name();
		$this->load->view('home', $data);


	}
}
