<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Survei_model extends CI_Model {

	public function survei($id)
	{
    $sql_survei = "SELECT * FROM tb_survei
                    WHERE id = ?";
    return $this->db->query($sql_survei, array($id))->row_array();
	}

  public function pertanyaan($id)
  {
    $sql_pertanyaan = "SELECT id, nama_pertanyaan, tipe FROM tb_pertanyaan
                        WHERE survei_id = ?";
    return $this->db->query($sql_pertanyaan, array($id))->result_array();
  }

  public function opsi($id)
  {
    $sql_opsi = "SELECT id, nama_opsi FROM tb_pertanyaan_opsi
                  WHERE pertanyaan_id = ?";
    return $this->db->query($sql_opsi, array($id))->result();
  }

}
