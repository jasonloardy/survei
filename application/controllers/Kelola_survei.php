<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kelola_survei extends CI_Controller {

  function __construct()
  {
    parent::__construct();
    if ($this->session->userdata('isLogin') == FALSE) {
      redirect('/');
    } else {
      $this->load->model('kelola_survei_model');
    }
  }

	public function index()
	{
    $data = array(
      'title' => 'Kelola Data Survei'
    );
    $this->load->view('pages/kelola_survei', $data);
	}

  public function tambah()
  {
    if (isset($_POST['submit'])) {
      $params = $_POST['param'];
      // echo json_encode($params);

      $insertSurvei = $this->kelola_survei_model->insert_survei($params);
      if ($insertSurvei) {
        $this->session->set_flashdata('msgInsertSurveiOk', 'Data Survei berhasil ditambahkan!');
      }
      redirect('/kelola_survei', 'refresh');
    }
  }

  public function hapus($id)
  {
    $cek = $this->kelola_survei_model->cek_before_delete($id);
    if (!$cek) {
      $hapusSurvei = $this->kelola_survei_model->delete_survei($id);
      if ($hapusSurvei) {
        $this->session->set_flashdata('msgHapusSurveiOk', 'Data Survei berhasil dihapus!');
      } else {
        $this->session->set_flashdata('msgHapusSurveiError', 'Data Survei gagal dihapus!');
      }
    } else {
      $this->session->set_flashdata('msgHapusSurveiError', 'Data Survei gagal dihapus!');
    }
    redirect('/kelola_survei', 'refresh');
  }

  public function json_all()
  {
    $all_survei = $this->kelola_survei_model->all_survei();
    echo json_encode($all_survei);
  }

}
