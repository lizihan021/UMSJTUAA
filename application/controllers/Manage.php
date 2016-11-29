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
		$data["page_name"] = substr($_SERVER["REQUEST_URI"], 1, strlen($_SERVER["REQUEST_URI"]));
		$data["discription"] = $data["page_name"];
		$this->load->view("manage", $data);
	}

	public function save()
	{
		$content = $this->input->post('content');
		$news_info = array('title' => 'yo',
						   'content' => $content );
		$this->m_manage->write_news_info($news_info);
		/*
		if($this->m_manage->write_news_info($news_info))
		{
			echo "success";
		}
		else
		{
			echo "error";
		}
		*/
	}

}
