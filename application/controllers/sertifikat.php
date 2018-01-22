<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sertifikat extends CI_Controller {
	public function tambahkan(){
		$idKaryawan 	= $_POST['idKaryawan'];
		$judul 			= $_POST['judul'];
		$penyelenggara 	= $_POST['penyelenggara'];
		$kota 			= $_POST['kota'];
		$thn_seminar 	= $_POST['thn_seminar'];
		$hasil 			= $_POST['hasil'];
		$data = array(
				'idKaryawan' 			=> $idKaryawan,
				'idKaryTrainSeminar'	=> "",
				'judul' 				=> $judul,
				'penyelenggara'			=> $penyelenggara,
				'kota'					=> $kota,
				'thn_seminar'			=> $thn_seminar,
				'hasil'					=> $hasil,
				);
		$add = $this->db->insert('tbl_karytrainseminar',$data);
		if($add >= 1){
			redirect("karyawan/tambah_info/sertifikat/$idKaryawan");
		}
	}
	public function hapus($idKaryawan){
		$where_idKaryawan = array('idKaryawan' => $idKaryawan);
		$jumlah_baris = $this->db->count_all_results('tbl_karytrainseminar',$where_idKaryawan);
		for($i=1; $i<=$jumlah_baris; $i++){
			if (isset($_POST['cek_'.$i])) {
				$where_idKaryTrainSeminar = array('idKaryTrainSeminar' => $_POST['cek_'.$i]);
				$data = $this->db->Delete('tbl_karytrainseminar',$where_idKaryTrainSeminar);	
			}
		}
		redirect("karyawan/tambah_info/sertifikat/$idKaryawan");	
	}
	public function edit($idKaryTrainSeminar){
		$d = $this->model->GetData("tbl_karytrainseminar where idKaryTrainSeminar = '$idKaryTrainSeminar'");
		$idKaryawan = $d[0]['idKaryawan'];
		$c = $this->model->GetData("tbl_karyawan where idKaryawan = '$idKaryawan'");
		$data = array(
			'idKaryawan'			=> $d[0]['idKaryawan'] ,
			'namaLengkap' 			=> $c[0]['namaLengkap'] ,
			'statusKerja' 			=> $c[0]['statusKerja'],
			'idKaryTrainSeminar'	=> $d[0]['idKaryTrainSeminar'],
			'judul'					=> $d[0]['judul'],
			'penyelenggara'			=> $d[0]['penyelenggara'],
			'kota'		 			=> $d[0]['kota'],
			'thn_seminar'			=> $d[0]['thn_seminar'],
			'hasil'					=> $d[0]['hasil'],
			);
		$data_organisasi = $this->model->GetData("tbl_organisasi ORDER BY idOrg ASC");
		$data_jabatan = $this->model->GetData("tbl_jabatan ORDER BY idJabatan ASC");
		$this->load->view('nav',array('data_organisasi' => $data_organisasi,'data_jabatan' => $data_jabatan));
		$this->load->view('form_edit_sertifikat',$data);
	}
	public function editkan($idKaryTrainSeminar){
		$idKaryawan 	= $_POST['idKaryawan'];
		$judul 			= $_POST['judul'];
		$penyelenggara 	= $_POST['penyelenggara'];
		$kota 			= $_POST['kota'];
		$thn_seminar 	= $_POST['thn_seminar'];;
		$hasil 			= $_POST['hasil'];

		$data = array(
			'idKaryawan' 			=> $idKaryawan,
			'judul' 				=> $judul,
			'penyelenggara'			=> $penyelenggara,
			'kota'					=> $kota,
			'thn_seminar'			=> $thn_seminar,
			'hasil'					=> $hasil,
		);

		$where = array('idKaryTrainSeminar' => $idKaryTrainSeminar);
		$res = $this->db->update('tbl_karytrainseminar',$data,$where);

		if($res >= 1){
			redirect("karyawan/tambah_info/sertifikat/$idKaryawan");
		}		
	}
}
