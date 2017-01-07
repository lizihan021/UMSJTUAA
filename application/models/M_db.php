<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_db extends CI_Model {

	public function __construct()
	{
		parent::__construct();
	}

	public function get_site_name()
	{
		/*
		$query = $this->db->get('aa_site_info');
		foreach ($query->result() as $row)
		{
			echo $row->item.'<br> ';
		    echo $row->value.'<br> ';
		}
		$test = $query->result()[1]->value;
		return $test;
		*/
		$query = $this->db->get_where('aa_site_info', array('item' => 'site_name'));

		return $query->result()[0]->value;
	}
}
