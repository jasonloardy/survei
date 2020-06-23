<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kelola_survei_model extends CI_Model {

	public function all_survei()
	{
		$sql = "SELECT ts.id, nama_survei, deskripsi,
						COUNT(tj.id) responden
						FROM tb_survei ts
						JOIN tb_jawaban tj ON ts.id = tj.survei_id
						GROUP BY ts.id";

    return $this->db->query($sql)->result();
	}

	public function insert_survei($param)
	{
		$nama_survei = $param['nama_survei'];
		$deskripsi = $param['deskripsi'];
		$geo = $param['geo'];
		$pertanyaan = $param['pertanyaan'];

		$sql_survei = "INSERT INTO tb_survei (nama_survei, deskripsi, geo) VALUES (?, ?, ?)";
		$sql_pertanyaan = "INSERT INTO tb_pertanyaan (survei_id, nama_pertanyaan, tipe) VALUES (?, ?, ?)";
		$sql_opsi = "INSERT INTO tb_pertanyaan_opsi (pertanyaan_id, nama_opsi) VALUES (?, ?)";

		$this->db->trans_start();

		$this->db->query($sql_survei, array($nama_survei, $deskripsi, $geo));
		$survei_id = $this->db->insert_id();

		foreach ($pertanyaan as $p) {
			$this->db->query($sql_pertanyaan, array($survei_id, $p['nama'], $p['tipe']));
			$pertanyaan_id = $this->db->insert_id();

			if (isset($p['opsi'])) {
				foreach ($p['opsi'] as $o) {
					$this->db->query($sql_opsi, array($pertanyaan_id, $o));
				}
			}
		}

		$this->db->trans_complete();

		return $this->db->trans_status();
	}

	public function cek_before_delete($id)
	{
		$sql_cek = "SELECT *
								FROM tb_jawaban tj
								JOIN tb_pertanyaan tp ON tj.pertanyaan_id = tp.id
								WHERE tp.survei_id = $id";
		return $this->db->query($sql_cek)->row();
	}

	public function delete_survei($id)
	{
		$sql_delete = "DELETE ts, tp, tpo
										FROM tb_survei ts
										LEFT JOIN tb_pertanyaan tp ON ts.id = tp.survei_id
										LEFT JOIN tb_pertanyaan_opsi tpo ON tp.id = tpo.pertanyaan_id
										WHERE ts.id = $id";
		$this->db->query($sql_delete);
		return $this->db->affected_rows() > 0;
	}

}
