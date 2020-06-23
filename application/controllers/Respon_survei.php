<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Respon_survei extends CI_Controller {

	function __construct()
  {
    parent::__construct();
    if ($this->session->userdata('isLogin') == FALSE) {
      redirect('/');
    } else {
      $this->load->model('respon_survei_model');
    }
  }

	public function index()
	{
    $data = array(
      'title' => 'Lihat Respon Survei'
    );
		$this->load->view('pages/respon_survei', $data);
	}

  public function detail($id)
  {
		$survei = $this->respon_survei_model->survei($id);

    $data = array(
      'title' => 'Detail Survei',
			'nama_survei' => $survei->nama_survei
    );
		$this->load->view('pages/detail_survei', $data);

		// echo json_encode($survei);
  }

	public function detail_json($id)
	{
		$response['type'] = 'FeatureCollection';

		$jawaban = $this->respon_survei_model->jawaban($id);
		$index = 0;
		foreach ($jawaban as $j) {
			$response['features'][$index]['type'] = 'Feature';
			$response['features'][$index]['geometry']['type'] = 'Point';
			$response['features'][$index]['geometry']['coordinates'] = explode(', ', $j->geolocation);
			$response['features'][$index]['properties']['title'] = '';
			$response['features'][$index]['properties']['description'] = '';
			$index++;
		}

		echo json_encode($response);
		// echo json_encode($jawaban);
	}
}
