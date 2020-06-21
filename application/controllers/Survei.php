<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Survei extends CI_Controller {

  function __construct()
  {
    parent::__construct();
    $this->load->model('survei_model');
  }

	public function index($id)
	{
    $dataSurvei = $this->survei_model->survei($id);

    $response = $dataSurvei;

    $response['pertanyaan'] = array();

    $pertanyaan = $this->survei_model->pertanyaan($id);

    foreach ($pertanyaan as $p) {
      $p['opsi'] = array();

      $pDetail = $this->survei_model->opsi($p['id']);
      foreach ($pDetail as $pd) {
          array_push($p['opsi'], $pd);
      }
      array_push($response['pertanyaan'], $p);
    }

    $data = $response;

    $this->load->view('pages/survei', $data);
	}

  public function json($id)
	{
    $dataSurvei = $this->survei_model->survei($id);

    $response = $dataSurvei;

    $response['pertanyaan'] = array();

    $pertanyaan = $this->survei_model->pertanyaan($id);

    foreach ($pertanyaan as $p) {
      $p['opsi'] = array();

      $pDetail = $this->survei_model->opsi($p['id']);
      foreach ($pDetail as $pd) {
          array_push($p['opsi'], $pd);
      }
      array_push($response['pertanyaan'], $p);
    }

    echo json_encode($response);
	}

  public function submit() {
    if (isset($_POST['submit'])) {
      $params = $_POST['param'];
      // echo json_encode($params);

      $insertJawaban = $this->survei_model->insert_jawaban($params);
      if ($insertJawaban) {
        $this->session->set_flashdata('msgInsertJawabanOk', 'Terima kasih, tanggapan anda berhasil tersimpan!');
      }

      $data = $params;

      $this->load->view('pages/survei_terkirim', $data);
    }
  }
}
