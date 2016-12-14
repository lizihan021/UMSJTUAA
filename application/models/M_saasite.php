<?php if (!defined('BASEPATH'))
{
	exit('No direct script access allowed');
}

class M_saasite extends CI_Model
{

	public $site_config;

	function __construct()
	{
		parent::__construct();
		
	}

	public function get_site_config()
	{
	}

	public function update_site_config($data)
	{
	}
	
	public function html_purify($string)
	{
		return preg_replace("/<([a-zA-Z]+)[^>]*>/", "", $string);
	}
	
	public function html_base64($string)
	{
		return base64_encode($this->html_purify($string));
	}
	

	public function redirect_login($type)
	{
		if ($_SESSION['userid'] == '' || !isset($_SESSION['userid']))
		{
			redirect(base_url('login?url=' . base64_encode($_SERVER["REQUEST_URI"])));
		}
		if ($type != $_SESSION['usertype'])
		{
			switch ($_SESSION['usertype'])
			{
			case 'student':
			case 'teacher':
			case 'manage':
				redirect(base_url('ta/evaluation/' . $_SESSION['usertype']));
				break;
			default:
				redirect(base_url('ta/evaluation/'));
				break;
			}

		}
	}
}

