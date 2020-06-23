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

	public function insert_jawaban($param)
	{
		$jawaban = $param['jawaban'];

		$sql_jawaban = "INSERT INTO tb_jawaban (survei_id, tanggal, geolocation) VALUES (?, ?, ?)";
		$sql_jawaban_detail = "INSERT INTO tb_jawaban_detail (jawaban_id, pertanyaan_id, pertanyaan_opsi_id, jawaban_text) VALUES (?, ?, ?, ?)";

		$this->db->trans_start();

		$this->db->query($sql_jawaban, array($param['survei_id'], date('Y-m-d H:i:s'), $param['geolocation']));

		$jawaban_id = $this->db->insert_id();

		foreach ($jawaban as $j) {

			if (isset($j['text'])) {
				$this->db->query($sql_jawaban_detail, array($jawaban_id, $j['pertanyaan_id'], NULL, $j['text']));
			}
			elseif (isset($j['opsi'])) {
				foreach ($j['opsi'] as $opsi) {
					$this->db->query($sql_jawaban_detail, array($jawaban_id, $j['pertanyaan_id'], $opsi, NULL));
				}
			}

		}

		$this->db->trans_complete();

		return $this->db->trans_status();
	}

}
