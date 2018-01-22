<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Organisasi extends CI_Controller {

	/* DATA ORGANISASI */
	public function tambah(){
		$data_organisasi = $this->model->GetData("tbl_organisasi ORDER BY idOrg ASC");
		$data_jabatan = $this->model->GetData("tbl_jabatan ORDER BY idJabatan ASC");
		$this->load->view('nav',array('data_organisasi' => $data_organisasi,'data_jabatan' => $data_jabatan));
		$this->load->view('form_tambah_organisasi',array('data_organisasi' => $data_organisasi,'data_jabatan' => $data_jabatan));	
	}
	public function tambahkan(){
		$namaOrg 		= $_POST['namaOrg'];
		$alamatOrg 		= $_POST['alamatOrg'];

		$data = array(
					'idOrg' => "",
					'namaOrg' => $namaOrg,
					'alamatOrg' => $alamatOrg,
					);

		$add = $this->db->insert('tbl_organisasi',$data);
		if($add >= 1){
			redirect("organisasi/tampil");
		}
	}
	public function tampil(){
		$data_organisasi = $this->model->GetData("tbl_organisasi ORDER BY idOrg ASC");
		$data_jabatan = $this->model->GetData("tbl_jabatan ORDER BY idJabatan ASC");
		$this->load->view('nav',array('data_organisasi' => $data_organisasi,'data_jabatan' => $data_jabatan));
		$data = $this->model->GetData("tbl_organisasi");
		$this->load->view('tampil_organisasi',array('data' => $data));
	}
	public function hapus($idOrg){
		$where = array('idOrg' => $idOrg);
		$data = $this->db->Delete('tbl_organisasi',$where);
		if($data >= 1){
			redirect("organisasi/tampil");
		}
	}
	public function edit($idOrg){
		$d = $this->model->GetData("tbl_organisasi where idOrg = '$idOrg'");
		$data = array(
				'idOrg' 		=> $d[0]['idOrg'],
				'namaOrg' 		=> $d[0]['namaOrg'],
				'alamatOrg'		=> $d[0]['alamatOrg'],
			);
		$data_organisasi = $this->model->GetData("tbl_organisasi ORDER BY idOrg ASC");
		$data_jabatan = $this->model->GetData("tbl_jabatan ORDER BY idJabatan ASC");
		$this->load->view('nav',array('data_organisasi' => $data_organisasi,'data_jabatan' => $data_jabatan));
		$this->load->view('form_edit_organisasi',$data);
	}
	public function editkan($idOrg){
		$namaOrg 	= $_POST['namaOrg'];
		$alamatOrg 		= $_POST['alamatOrg'];
		$data = array(
					'namaOrg' => $namaOrg,
					'alamatOrg' => $alamatOrg,
					);
		$where = array('idOrg' => $idOrg);
		$res = $this->db->update('tbl_organisasi',$data,$where);
		if($res >= 1){
			redirect("organisasi/tampil");
		}		
	}
	/* end DATA ORGANISASI */
}