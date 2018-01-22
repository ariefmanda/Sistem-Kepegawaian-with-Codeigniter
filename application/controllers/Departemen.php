<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Departemen extends CI_Controller {

	public function tampil_organisasi(){
		$data_organisasi = $this->model->GetData("tbl_organisasi ORDER BY idOrg ASC");
		$data_jabatan = $this->model->GetData("tbl_jabatan ORDER BY idJabatan ASC");
		$this->load->view('nav',array('data_organisasi' => $data_organisasi,'data_jabatan' => $data_jabatan));

		$data = $this->model->GetD("tbl_organisasi.idOrg,tbl_organisasi.namaOrg
			FROM tbl_organisasi
			ORDER by tbl_organisasi.idOrg asc");
		$this->load->view('tampil_pilih_org_dept',array('data' => $data));
	}

	public function tampil($idOrg){
		$d = $this->model->GetData("tbl_organisasi where idOrg = '$idOrg'");
		$e = $this->model->GetData("tbl_departemen where idOrg = '$idOrg'");
		$data_organisasi = $this->model->GetData("tbl_organisasi ORDER BY idOrg ASC");
		$data_jabatan = $this->model->GetData("tbl_jabatan ORDER BY idJabatan ASC");
		$data_departemen = $this->model->GetData("tbl_departemen ORDER BY idDept ASC");
		$this->load->view('nav',array('data_organisasi' => $data_organisasi,'data_jabatan' => $data_jabatan,'data_departemen' => $data_departemen));
		$this->load->view('tampil_departemen',array('e' => $e,'idOrg' => $idOrg,'d' => $d));
	}
	public function tambah($idOrg){
		$d = $this->model->GetData("tbl_organisasi where idOrg = '$idOrg'");
		$data = array(
				'idOrg' 		=> $d[0]['idOrg'] ,
				'namaOrg' 		=> $d[0]['namaOrg'] ,
			);
		$data_organisasi = $this->model->GetData("tbl_organisasi ORDER BY idOrg ASC");
		$data_jabatan = $this->model->GetData("tbl_jabatan ORDER BY idJabatan ASC");
		$this->load->view('nav',array('data_organisasi' => $data_organisasi,'data_jabatan' => $data_jabatan));
		$this->load->view('form_tambah_departemen',$data);
	}
	public function tambahkan(){
		$idOrg 	= $_POST['idOrg'];
		$namaDept 		= $_POST['namaDept'];
		$data = array(
				'idDept'		=> "",
				'idOrg' 		=> $idOrg,
				'namaDept' 		=> $namaDept,
				);
		$add = $this->db->insert('tbl_departemen',$data);
		if($add >= 1){
			redirect("departemen/tampil/$idOrg");
		}
	}
	public function hapus($idOrg){
		$where_idOrg = array('idOrg' => $idOrg);
		$jumlah_baris = $this->db->count_all_results('tbl_departemen',$where_idOrg);
		for($i=1; $i<=$jumlah_baris; $i++){
			if (isset($_POST['cek_'.$i])) {
				$where_idDept = array('idDept' => $_POST['cek_'.$i]);
				$data = $this->db->Delete('tbl_departemen',$where_idDept);
			}
		}
		redirect("departemen/tampil/$idOrg");	
	}
	public function edit($idDept){
		$d = $this->model->GetData("tbl_departemen where idDept = '$idDept'");
		$idOrg = $d[0]['idOrg'];
		$c = $this->model->GetData("tbl_organisasi where idOrg = '$idOrg'");
		$data = array(
			'idOrg'		=> $d[0]['idOrg'] ,
			'namaOrg' 		=> $c[0]['namaOrg'] ,
			'idDept' 			=> $d[0]['idDept'],
			'namaDept'	 		=> $d[0]['namaDept'],
			);
		$data_organisasi = $this->model->GetData("tbl_organisasi ORDER BY idOrg ASC");
		$data_jabatan = $this->model->GetData("tbl_jabatan ORDER BY idJabatan ASC");
		$data_departemen = $this->model->GetData("tbl_departemen ORDER BY idDept ASC");
		$this->load->view('nav',array('data_organisasi' => $data_organisasi,'data_jabatan' => $data_jabatan,'data_departemen' => $data_departemen));
		$this->load->view('form_edit_departemen',$data);
	}
	public function editkan($idDept){
		$idOrg 	= $_POST['idOrg'];
		$namaDept 		= $_POST['namaDept'];
		$data = array(
			'idOrg' 			=> $idOrg,
			'namaDept' 			=> $namaDept,
		);

		$where = array('idDept' => $idDept);
		
		$res = $this->db->update('tbl_departemen',$data,$where);

		if($res >= 1){
			redirect("departemen/tampil/$idOrg");
		}		
	}
	public function cari(){
		$cari= $this->input->get('input_cari');
		$data_organisasi = $this->model->GetData("tbl_organisasi ORDER BY idOrg ASC");
		$data_jabatan = $this->model->GetData("tbl_jabatan ORDER BY idJabatan ASC");
		$this->load->view('nav',array('data_organisasi' => $data_organisasi,'data_jabatan' => $data_jabatan));
		$data = $this->model->GetD("tbl_organisasi.idOrg,tbl_organisasi.namaOrg
			FROM tbl_organisasi
			where tbl_organisasi.namaOrg like '%$cari%'
			ORDER by tbl_organisasi.idOrg asc");
		$this->load->view('tampil_pilih_org_dept',array('data' => $data));
	}
	
}
