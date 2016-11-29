<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_home');
		$this->load->helper('url');
		$this->output->enable_profiler(TRUE);
	}

	public function index()
	{

		$data['test_data'] = $this->m_home->get_site_name();
		$data['news'] = $this->m_home->get_news_info();
		$this->load->view('home', $data);


	}
}
