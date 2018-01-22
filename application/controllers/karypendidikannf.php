<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Karypendidikannf extends CI_Controller {
	public function tambahkan(){
		$idKaryawan 	= $_POST['idKaryawan'];
		$judulKursus 	= $_POST['judulKursus'];
		$penyelenggara 	= $_POST['penyelenggara'];
		$kota 			= $_POST['kota'];
		$durasi 		= $_POST['durasi'];
		$thnSertifikat 	= $_POST['thnSertifikat'];

		$data = array(
				'idKaryPendNF'	=> "",
				'idKaryawan' 	=> $idKaryawan,
				'judulKursus' 	=> $judulKursus,
				'penyelenggara'	=> $penyelenggara,
				'kota'			=> $kota,
				'durasi'		=> $durasi,
				'thnSertifikat'	=> $thnSertifikat,
				);
		$add = $this->db->insert('tbl_karypendidikannf',$data);
		if($add >= 1){
			redirect("karyawan/tambah_info/kursus/$idKaryawan");
		}
	}
	public function hapus($idKaryawan){
		$where_idKaryawan = array('idKaryawan' => $idKaryawan);
		$jumlah_baris = $this->db->count_all_results('tbl_karypendidikannf',$where_idKaryawan);
		for($i=1; $i<=$jumlah_baris; $i++){
			if (isset($_POST['cek_'.$i])) {
				$where_idKaryPendNF = array('idKaryPendNF' => $_POST['cek_'.$i]);
				$data = $this->db->Delete('tbl_karypendidikannf',$where_idKaryPendNF);	
			}
		}
		redirect("karyawan/tambah_info/kursus/$idKaryawan");	
	}
	public function edit($idKaryPendNF){
		$d = $this->model->GetData("tbl_karypendidikannf where idKaryPendNF = '$idKaryPendNF'");
		$idKaryawan = $d[0]['idKaryawan'];
		$c = $this->model->GetData("tbl_karyawan where idKaryawan = '$idKaryawan'");
		$data = array(
			'idKaryawan'		=> $d[0]['idKaryawan'] ,
			'namaLengkap' 		=> $c[0]['namaLengkap'] ,
			'statusKerja' 		=> $c[0]['statusKerja'],
			'idKaryPendNF' 		=> $d[0]['idKaryPendNF'],
			'judulKursus'		=> $d[0]['judulKursus'],
			'penyelenggara'	 	=> $d[0]['penyelenggara'],
			'durasi' 				=> $d[0]['durasi'],
			'kota' 				=> $d[0]['kota'],
			'thnSertifikat' 	=> $d[0]['thnSertifikat'],
			);
		$data_organisasi = $this->model->GetData("tbl_organisasi ORDER BY idOrg ASC");
		$data_jabatan = $this->model->GetData("tbl_jabatan ORDER BY idJabatan ASC");
		$this->load->view('nav',array('data_organisasi' => $data_organisasi,'data_jabatan' => $data_jabatan));
		$this->load->view('form_edit_kursus',$data);
	}
	public function editkan($idKaryPendNF){
		$idKaryawan 	= $_POST['idKaryawan'];
		$judulKursus 	= $_POST['judulKursus'];
		$penyelenggara 	= $_POST['penyelenggara'];
		$kota	 		= $_POST['kota'];
		$thnSertifikat	= $_POST['thnSertifikat'];

		$data = array(
			'idKaryawan' 	=> $idKaryawan,
			'judulKursus'	=> $judulKursus,
			'penyelenggara' => $judulKursus,
			'penyelenggara' => $penyelenggara,
			'kota' 			=> $kota,
			'thnSertifikat'	=> $thnSertifikat,
		);

		$where = array('idKaryPendNF' => $idKaryPendNF);
		
		$res = $this->db->update('tbl_karypendidikannf',$data,$where);

		if($res >= 1){
			redirect("karyawan/tambah_info/kursus/$idKaryawan");
		}		
	}
}
