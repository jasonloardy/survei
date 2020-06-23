<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Respon_survei_model extends CI_Model {

  public function survei($id)
  {
    $this->db->where('id', $id);
    return $this->db->get('tb_survei')->row();
  }

  public function jawaban($id)
  {
    $this->db->where('survei_id', $id);
    return $this->db->get('tb_jawaban')->result();
  }

	public function responden($id)
	{
    $sql_responden = "SELECT *
                      FROM tb_jawaban tj
                      JOIN tb_jawaban_detail tjd ON tj.id = tjd.jawaban_id
                      JOIN tb_pertanyaan_opsi tpo ON tjd.pertanyaan_opsi_id = tpo.id
                      WHERE survei_id = $id";
    return $this->db->query($sql_responden)->result();
	}

}
