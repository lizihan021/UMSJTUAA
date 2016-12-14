<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class News extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_news');
		$this->output->enable_profiler(TRUE);
	}

	public function index($news_id = 1)
	{

		$data['test_data'] = 'News';
		$data['news'] = $this->m_news->get_news_info($news_id);
		$this->load->view('news', $data);

	}
}
