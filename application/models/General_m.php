<?php

class General_m extends CI_Model
{

	function __construct()
    {
        parent::__construct();
    }

    public function get_company_list()
    {
    	$sql = "SELECT * FROM tbl_company";
    	$query = $this->db->query($sql);
    	return $query->result_array();
    }

    public function get_company_image()
    {
    	$sql = "SELECT * FROM tbl_company_image";
    	$query = $this->db->query($sql);
    	return $query->result_array();
    }

    public function upload_company_name($data)
    {
    	$file = $data['file'];
		$file = str_replace("'", "''", "$file");
		$id = $data['id'];

    	$sql = "INSERT INTO tbl_company_image(company,path) VALUES(".$id.",'".$file."')";
    	$query = $this->db->query($sql);

    	$sql = "SELECT MAX(id) as id FROM tbl_company_image WHERE company = ".$id;
    	$query = $this->db->query($sql);
    	$result = $query->result_array();

    	$sql = "SELECT * FROM tbl_company_image WHERE id = ".$result[0]['id'];
    	$query = $this->db->query($sql);
    	return $query->result_array();
    }

    public function get_company_message()
    {
    	$sql = "SELECT * FROM tbl_message";
    	$query = $this->db->query($sql);
    	return $query->result_array();
    }

    public function get_company_link()
    {
    	$sql = "SELECT * FROM tbl_link";
    	$query = $this->db->query($sql);
    	return $query->result_array();
    }

    public function get_company_addon()
    {
    	$sql = "SELECT * FROM tbl_addon";
    	$query = $this->db->query($sql);
    	return $query->result_array();
    }

    public function get_company_hash()
    {
    	$sql = "SELECT * FROM tbl_hash";
    	$query = $this->db->query($sql);
    	return $query->result_array();
    }

    public function save_new_message($id,$message)
    {
    	$message = str_replace("'", "''", "$message");
    	$sql = "INSERT INTO tbl_message(company,message) VALUES(".$id.",'".$message."')";
    	$query = $this->db->query($sql);

    	return "success";
    }

    public function save_new_addon($id,$message)
    {
    	$message = str_replace("'", "''", "$message");
    	$sql = "INSERT INTO tbl_addon(company,message) VALUES(".$id.",'".$message."')";
    	$query = $this->db->query($sql);

    	return "success";
    }

    public function save_new_link($id,$new_nick,$new_link)
    {
    	$nick = str_replace("'", "''", "$nick");
    	$link = str_replace("'", "''", "$link");
    	
    	$sql = "INSERT INTO tbl_link(company,nick,link) VALUES(".$id.",'".$new_nick."','".$new_link."')";
    	$query = $this->db->query($sql);
    	return "success";
    }

    public function save_new_hash($id,$hash)
    {
    	$hash = str_replace("'", "''", "$hash");

    	$sql = "INSERT INTO tbl_hash(company,hash) VALUES(".$id.",'".$hash."')";
    	$query = $this->db->query($sql);
    	return "success";
    }

    public function get_link_by_id($id)
    {
    	$sql = "SELECT * FROM tbl_link WHERE id = ".$id;
    	$query = $this->db->query($sql);
    	return $query->result_array();
    }

    public function save_post($company,$image,$message,$link,$nick,$addon,$hash){
    	$message = str_replace("'", "''", "$message");
    	$nick = str_replace("'", "''", "$nick");
    	$link = str_replace("'", "''", "$link");
    	$addon = str_replace("'", "''", "$addon");
    	$hash = str_replace("'", "''", "$hash");

    	$sql = "INSERT INTO tbl_post(company,image,message,link,nick,addon,hash) VALUES(".$company.",'".$image."','".$message."','".$link."','".$nick."','".$addon."','".$hash."')";
    	$query = $this->db->query($sql);
    	return "success";
    }
}


?>

