<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {
	public function index()
	{
		$data_organisasi = $this->model->GetData("tbl_organisasi");
		$data_jabatan = $this->model->GetData("tbl_jabatan");
		$this->load->view('nav',array('datas_organisasi' => $data_organisasi,'data_jabatan' => $data_jabatan));
		$this->load->view('halaman_utama');
	}
}
