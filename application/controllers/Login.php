<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		//$this->load->model('m_login');
		$this->load->helper('form');
		$this->load->helper('url');
		//$this->output->enable_profiler(TRUE);
	}

	public function index()
	{

		$this->load->library('form_validation');//验证数据格式
		$this->form_validation->set_rules('username','username','trim|required');
		$this->form_validation->set_rules('password','password','trim|required');

		$data['url'] = $this->input->get('url');
		$this->load->view('login', $data);

	}

	function test()
	{
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$url = $this->input->get('url');
		if($username == 'lizihan' && ($password == '111')){
			$_SESSION['user'] = $username;
			header("Location:".base64_decode($url));
		}
		else {
			header("Location:/login?url=".substr($url,1,strlen($url)));
		}
	}
	
	function logout(){
		session_destroy();
		header('Location:/');
	}
}
