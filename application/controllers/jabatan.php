<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jabatan extends CI_Controller {

	public function tampil_organisasi(){
		$data_organisasi = $this->model->GetData("tbl_organisasi ORDER BY idOrg ASC");
		$data_jabatan = $this->model->GetData("tbl_jabatan ORDER BY idJabatan ASC");
		$this->load->view('nav',array('data_organisasi' => $data_organisasi,'data_jabatan' => $data_jabatan));

		$data = $this->model->GetD("tbl_organisasi.idOrg,tbl_organisasi.namaOrg,tbl_departemen.idDept,tbl_Departemen.namaDept
			FROM tbl_departemen
			JOIN tbl_organisasi ON tbl_organisasi.idOrg = tbl_departemen.idOrg
			ORDER by tbl_departemen.idDept asc");
		$this->load->view('tampil_pilih_organisasi',array('data' => $data));
	}

	public function tampil($idDept){
		$e = $this->model->GetData("tbl_departemen where idDept = '$idDept'");
		$idOrg = $e[0]['idOrg'];
		$c = $this->model->GetData("tbl_organisasi where idOrg = '$idOrg'");
		$b = $this->model->GetData("tbl_jabatan where idDept = '$idDept'");
		$data_organisasi = $this->model->GetData("tbl_organisasi ORDER BY idOrg ASC");
		$data_jabatan = $this->model->GetData("tbl_jabatan ORDER BY idJabatan ASC");
		$this->load->view('nav',array('data_organisasi' => $data_organisasi,'data_jabatan' => $data_jabatan));
		$this->load->view('tampil_jabatan',array('c' => $c,'idDept' => $idDept,'e' => $e,'b' => $b));
	}
	public function tambah($idDept){
		$e = $this->model->GetData("tbl_departemen where idDept = '$idDept'");
		$idOrg = $e[0]['idOrg'];
		$c = $this->model->GetData("tbl_organisasi where idOrg = '$idOrg'");
		$data = array(
				'idDept' 		=> $e[0]['idDept'] ,
				'namaDept' 		=> $e[0]['namaDept'] ,
				'namaOrg' 		=> $c[0]['namaOrg'] ,
			);
		$data_organisasi = $this->model->GetData("tbl_organisasi ORDER BY idOrg ASC");
		$data_jabatan = $this->model->GetData("tbl_jabatan ORDER BY idJabatan ASC");
		$this->load->view('nav',array('data_organisasi' => $data_organisasi,'data_jabatan' => $data_jabatan));
		$this->load->view('form_tambah_jabatan',$data);
	}
	public function tambahkan(){
		$idDept 			= $_POST['idDept'];
		$namaJabatan 		= $_POST['namaJabatan'];
		$data = array(
				'idjabatan'		=> "",
				'idDept' 		=> $idDept,
				'namaJabatan' 		=> $namaJabatan,
				);
		$add = $this->db->insert('tbl_jabatan',$data);
		if($add >= 1){
			redirect("jabatan/tampil/$idDept");
		}
	}
	public function hapus($idDept){
		$where_idDept = array('idDept' => $idDept);
		$jumlah_baris = $this->db->count_all_results('tbl_jabatan',$where_idDept);
		for($i=1; $i<=$jumlah_baris; $i++){
			if (isset($_POST['cek_'.$i])) {
				$where_idJabatan = array('idJabatan' => $_POST['cek_'.$i]);
				$data = $this->db->Delete('tbl_jabatan',$where_idjabatan);
			}
		}
		redirect("jabatan/tampil/$idDept");	
	}
	public function edit($idJabatan){
		$d = $this->model->GetData("tbl_jabatan where idJabatan = '$idJabatan'");
		$idDept = $d[0]['idDept'];
		$e = $this->model->GetData("tbl_departemen where idDept = '$idDept'");
		$idOrg = $e[0]['idOrg'];
		$c = $this->model->GetData("tbl_organisasi where idOrg = '$idOrg'");

		$data = array(
			'idDept'		=> $d[0]['idDept'] ,
			'namaDept' 		=> $e[0]['namaDept'] ,
			'namaOrg' 		=> $c[0]['namaOrg'] ,
			'idJabatan' 			=> $d[0]['idJabatan'],
			'namaJabatan'	 		=> $d[0]['namaJabatan'],
			);
		$data_organisasi = $this->model->GetData("tbl_organisasi ORDER BY idOrg ASC");
		$data_jabatan = $this->model->GetData("tbl_jabatan ORDER BY idJabatan ASC");
		$this->load->view('nav',array('data_organisasi' => $data_organisasi,'data_jabatan' => $data_jabatan));
		$this->load->view('form_edit_jabatan',$data);
	}
	public function editkan($idJabatan){
		$idDept				= $_POST['idDept'];
		$namaJabatan 		= $_POST['namaJabatan'];
		$data = array(
			'idDept' 			=> $idDept,
			'namaJabatan' 		=> $namaJabatan,
		);

		$where = array('idJabatan' => $idJabatan);
		$res = $this->db->update('tbl_jabatan',$data,$where);

		if($res >= 1){
			redirect("jabatan/tampil/$idDept");
		}		
	}
	public function cari(){
		$cari= $this->input->get('input_cari');
		$data_organisasi = $this->model->GetData("tbl_organisasi ORDER BY idOrg ASC");
		$data_jabatan = $this->model->GetData("tbl_jabatan ORDER BY idJabatan ASC");
		$this->load->view('nav',array('data_organisasi' => $data_organisasi,'data_jabatan' => $data_jabatan));
		$data = $this->model->GetD("tbl_departemen.idDept,tbl_departemen.namaDept
			FROM tbl_departemen
			where tbl_departemen.namaDept like '%$cari%'
			ORDER by tbl_departemen.iddept asc");
		$this->load->view('tampil_pilih_organisasi',array('data' => $data));
	}
	
}
