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
    return $this->db->get('tb_jawaban')->result_array();
  }

  public function pertanyaan($id)
  {
    $this->db->where('survei_id', $id);
    return $this->db->get('tb_pertanyaan')->result_array();
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

  public function jawaban_detail($jawaban_id, $pertanyaan_id)
  {
    $sql_jawaban_detail = "SELECT *
                            FROM tb_jawaban_detail tjd
                            LEFT JOIN tb_pertanyaan_opsi tpo ON tjd.pertanyaan_opsi_id = tpo.id
                            WHERE tjd.pertanyaan_id = $pertanyaan_id AND tjd.jawaban_id = $jawaban_id";
    // $this->db->select('pertanyaan_opsi_id, jawaban_text');
    // $this->db->where('jawaban_id', $jawaban_id);
    // $this->db->where('pertanyaan_id', $pertanyaan_id);
    return $this->db->query($sql_jawaban_detail)->result_array();
  }

}
