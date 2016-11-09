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

	/**
	 * 获取所有的网站设置项
	 * @return  关联数组
	 */
	public function get_site_config()
	{
		// 获取全局设置
		$query = $this->db->get('ji_common_config');
		$settings = $query->result_array();
		foreach ($settings as $setting)
		{
			$data[$setting['obj']] = $setting['data'];
		}
		// 获取TA设置
		$query = $this->db->get('ji_ta_config');
		$settings = $query->result_array();
		foreach ($settings as $setting)
		{
			$data[$setting['obj']] = $setting['data'];
		}
		$mtime = explode(' ', microtime());
		$startTime = floor(($mtime[1] + $mtime[0]) * 1000);
		$data['server_time'] = $startTime;
		$this->site_config = $data;
		return $data;
	}

	/**
	 * 更新网站设置
	 * @param   $data 关联数组
	 * @return        操作结果
	 */
	public function update_site_config($data)
	{
		foreach ($data as $key => $value)
		{
			$updatedata[] = array(
				'obj'  => $key,
				'data' => $value);
		}
		return $this->db->update_batch('ji_ta_config', $updatedata, 'obj');
	}
	
	public function html_purify($string)
	{
		return preg_replace("/<([a-zA-Z]+)[^>]*>/", "", $string);
	}
	
	public function html_base64($string)
	{
		return base64_encode($this->html_purify($string));
	}
	
	public function print_semester()
	{
		$semester_name = array(
			'1' => 'Fall',
			'2' => 'Spring',
			'3' => 'Summer');
		return substr($this->site_config['ji_academic_year'], 0, 4) . ' ' .
		       $semester_name[$this->site_config['ji_um_term']];
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

