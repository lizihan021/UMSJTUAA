<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_manage extends CI_Model {

	public function __construct()
	{
		parent::__construct();
	}

/*////////////// this is a template
	public function get_site_name()
	{
		
		$query = $this->db->get('aa_site_info'); // get all data from table aa_site_info
		foreach ($query->result() as $row)
		{
			echo $row->item.'<br> ';
		    echo $row->value.'<br> ';
		}
		$test = $query->result()[1]->value;
		return $test;
		
		// get data from aa_site_info where item == "site_name"
		$query = $this->db->get_where('aa_site_info', array('item' => 'site_name'));

		return $query->result()[0]->value;
	}
*///////////////

	/*
	** @ $news_info 
	** Return true or false, insert $news_info into database.
	** news_info include title content.
	*/
	
	public function get_news_info($news_num = 3)//added by log (copied from m_home)
	{
		$sql = 'SELECT `title`, `id` FROM `aa_news` ORDER BY `id` DESC';
		$query = $this->db->query($sql);
		return $query->result();
	}

	public function write_news_info($news_info)
	{
		//TODO//
		$sql = "INSERT INTO `aa_news`(`title`, `content`) VALUES ('".$news_info['title']."','".$news_info['content']."')";
		$this->db->query($sql);
		$sql = "SELECT `id` FROM `aa_news` WHERE `title`='".$news_info['title']."'";
		$query = $this->db->query($sql);
		return $query->result()[0]->id;
	}

	/*
	** @ $news_info 
	** Return true or false, insert $news_info into database.
	** there should be ID in news_info and the news with 
	** corresponding ID should be updated. If no ID matches
	** return false. 
	*/
	public function modefy_news_info($news_info)
	{
		//TODO//
	}

	/*
	** @ $news_info 
	** Return true or false, insert $news_info into database.
	** news_info include ID. If no ID matches return false. 
	** update ID?
	*/
	public function delete_news($news_id)
	{
		$sql = "DELETE FROM `aa_news` WHERE `ID` = $news_id";
		$query = $this->db->query($sql);
		return true;
	}
}
