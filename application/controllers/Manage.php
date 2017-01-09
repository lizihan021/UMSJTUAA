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
		//$this->output->enable_profiler(TRUE);
	}

	public function index()
	{
		$data["page_name"] = substr($_SERVER["REQUEST_URI"], 1, strlen($_SERVER["REQUEST_URI"]));
		$data["discription"] = $data["page_name"];
		//added by log
		$data['news'] = $this->m_manage->get_news_info();
		$this->load->view("manage", $data);
	}

	public function save()
	{
		$content = $this->input->post('content');
		$title = $this->input->post('title');
		if (strlen($title) > 200 || strlen($content) > 100000)
			return;
		//过滤html标签
		$title = strip_tags($title); 
		$news_info = array('title' => $title,
						   'content' => $content );
		$id="!";
		$id = $this->m_manage->write_news_info($news_info);
		if($id!="!")
		{
			echo $id;
		}
		else
		{
			echo "error";
		}
	}

	public function delete()
	{
		$id = $this->input->post('id'); ///////
		$this->m_manage->delete_news($id); //////
	}
}
