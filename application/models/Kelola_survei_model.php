<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kelola_survei_model extends CI_Model {

	public function all_survei()
	{
    return $this->db->get('tb_survei')->result();
	}

}
