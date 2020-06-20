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
    $param = $_POST['param'];
    echo count($param['pertanyaan']);
  }

  public function json_all()
  {
    $all_survei = $this->kelola_survei_model->all_survei();
    echo json_encode($all_survei);
  }

  public function json_detail($id)
  {

  }

}
