<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Karypendidikan extends CI_Controller {
	public function tambahkan(){
		$idKaryawan 	= $_POST['idKaryawan'];
		$namaSekolah 	= $_POST['namaSekolah'];
		$tingkatPend 	= $_POST['tingkatPend'];
		$jurusan 		= $_POST['jurusan'];
		$program 		= $_POST['program'];
		$kota 			= $_POST['kota'];
		$Graduate 		= $_POST['Graduate'];
		$thnTamat 		= $_POST['thnTamat'];

		$data = array(
				'idKaryPend'	=> "",
				'idKaryawan' 	=> $idKaryawan,
				'namaSekolah' 	=> $namaSekolah,
				'tingkatPend'	=> $tingkatPend,
				'jurusan'		=> $jurusan,
				'program'		=> $program,
				'kota'			=> $kota,
				'Graduate'		=> $Graduate,
				'thnTamat'		=> $thnTamat,
				);
		$add = $this->db->insert('tbl_karypendidikan',$data);
		if($add >= 1){
			redirect("karyawan/tambah_info/pendidikan/$idKaryawan");
		}
	}
	public function edit($idKaryPend){
		$d = $this->model->GetData("tbl_karypendidikan where idKaryPend = '$idKaryPend'");
		$idKaryawan = $d[0]['idKaryawan'];
		$c = $this->model->GetData("tbl_karyawan where idKaryawan = '$idKaryawan'");
		$data = array(
			'idKaryawan'		=> $d[0]['idKaryawan'] ,
			'namaLengkap' 		=> $c[0]['namaLengkap'] ,
			'statusKerja' 		=> $c[0]['statusKerja'],
			'idKaryPend'		=> $d[0]['idKaryPend'],
			'namaSekolah'	 	=> $d[0]['namaSekolah'],
			'tingkatPend'	 	=> $d[0]['tingkatPend'],
			'jurusan' 			=> $d[0]['jurusan'],
			'program' 			=> $d[0]['program'],
			'kota' 				=> $d[0]['kota'],
			'Graduate' 			=> $d[0]['Graduate'],
			'thnTamat' 			=> $d[0]['thnTamat'],
			);
		$data_organisasi = $this->model->GetData("tbl_organisasi ORDER BY idOrg ASC");
		$data_jabatan = $this->model->GetData("tbl_jabatan ORDER BY idJabatan ASC");
		$this->load->view('nav',array('data_organisasi' => $data_organisasi,'data_jabatan' => $data_jabatan));
		$this->load->view('form_edit_pendidikan_karyawan',$data);
	}
	public function editkan($idKaryPend){
		$idKaryawan 	= $_POST['idKaryawan'];
		$namaSekolah 	= $_POST['namaSekolah'];
		$tingkatPend 	= $_POST['tingkatPend'];
		$jurusan	 	= $_POST['jurusan'];
		$program 		= $_POST['program'];
		$kota 			= $_POST['kota'];
		$Graduate	 	= $_POST['Graduate'];
		$thnTamat	 	= $_POST['thnTamat'];

		$data = array(
			'idKaryawan' 	=> $idKaryawan,
			'namaSekolah'	=> $namaSekolah,
			'tingkatPend'	=> $tingkatPend,
			'jurusan' 		=> $jurusan,
			'program' 		=> $program,
			'kota' 			=> $kota,
			'Graduate' 		=> $Graduate,
			'thnTamat'		=> $thnTamat,
		);

		$where = array('idKaryPend' => $idKaryPend);
		
		$res = $this->db->update('tbl_karypendidikan',$data,$where);

		if($res >= 1){
			redirect("karyawan/tambah_info/pendidikan/$idKaryawan");
		}		
	}
	public function hapus($idKaryawan){
		$where_idKaryawan = array('idKaryawan' => $idKaryPend);
		$jumlah_baris = $this->db->count_all_results('tbl_karypendidikan',$where_idKaryawan);
		for($i=1; $i<=$jumlah_baris; $i++){
			if (isset($_POST['cek_'.$i])) {
				$where_idKaryPend = array('idKaryPend' => $_POST['cek_'.$i]);
				$data = $this->db->Delete('tbl_karypendidikan',$where_idKaryPend);	
			}
		}
		redirect("karyawan/tambah_info/pendidikan/$idKaryawan");	
	}
}
