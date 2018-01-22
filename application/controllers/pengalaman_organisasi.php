<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengalaman_organisasi extends CI_Controller {
	public function tambahkan(){
		$idKaryawan 		= $_POST['idKaryawan'];
		$Organisasi 		= $_POST['Organisasi'];
		$posisiTerakhir 	= $_POST['posisiTerakhir'];
		$kota		 		= $_POST['kota'];
		$thnKeluar		 	= $_POST['thnKeluar'];

		$data = array(
			'idKaryawan'		=>$idKaryawan,
			'idKaryPengOrg'	=> "",
			'Organisasi' 		=> $Organisasi,
			'posisiTerakhir'	=> $posisiTerakhir,
			'kota' 				=> $kota,
			'thnKeluar'			=> $thnKeluar,
		);
		$add = $this->db->insert('tbl_karypengorg',$data);
		if($add >= 1){
			redirect("karyawan/tambah_info/pengalaman_organisasi/$idKaryawan");
		}
	}
	public function hapus($idKaryawan){
		$where_idKaryawan = array('idKaryawan' => $idKaryawan);
		$jumlah_baris = $this->db->count_all_results('tbl_karypengorg',$where_idKaryawan);
		for($i=1; $i<=$jumlah_baris; $i++){
			if (isset($_POST['cek_'.$i])) {
				$where = array('idKaryPengOrg' => $_POST['cek_'.$i]);
				$data = $this->db->Delete('tbl_karypengorg',$where);	
			}
		}
		redirect("karyawan/tambah_info/pengalaman_organisasi/$idKaryawan");	
	}
	public function edit($idKaryPengOrg){
		$d = $this->model->GetData("tbl_karypengorg where idKaryPengOrg = '$idKaryPengOrg'");
		$idKaryawan = $d[0]['idKaryawan'];
		$c = $this->model->GetData("tbl_karyawan where idKaryawan = '$idKaryawan'");
		$data = array(
			'idKaryawan'		=> $d[0]['idKaryawan'] ,
			'namaLengkap' 		=> $c[0]['namaLengkap'] ,
			'statusKerja' 		=> $c[0]['statusKerja'],
			'idKaryPengOrg' 	=> $d[0]['idKaryPengOrg'],
			'Organisasi' 		=> $d[0]['Organisasi'],
			'posisiTerakhir' 	=> $d[0]['posisiTerakhir'],
			'kota'		 		=> $d[0]['kota'],
			'thnKeluar' 		=> $d[0]['thnKeluar'],
			);
		$data_organisasi = $this->model->GetData("tbl_organisasi ORDER BY idOrg ASC");
		$data_jabatan = $this->model->GetData("tbl_jabatan ORDER BY idJabatan ASC");
		$this->load->view('nav',array('data_organisasi' => $data_organisasi,'data_jabatan' => $data_jabatan));
		$this->load->view('form_edit_pengalaman_organisasi',$data);
	}
	public function editkan($idKaryPengOrg){
		$idKaryawan 		= $_POST['idKaryawan'];
		$Organisasi 		= $_POST['Organisasi'];
		$posisiTerakhir 	= $_POST['posisiTerakhir'];
		$kota		 		= $_POST['kota'];
		$thnKeluar		 	= $_POST['thnKeluar'];

		$data = array(
			'idKaryawan'		=>$idKaryawan,
			'Organisasi' 		=> $Organisasi,
			'posisiTerakhir'	=> $posisiTerakhir,
			'kota' 				=> $kota,
			'thnKeluar'			=> $thnKeluar,
		);

		$where = array('idKaryPengOrg' => $idKaryPengOrg);
		
		$res = $this->db->update('tbl_karypengorg',$data,$where);

		if($res >= 1){
			redirect("karyawan/tambah_info/pengalaman_organisasi/$idKaryawan");
		}		
	}
}

