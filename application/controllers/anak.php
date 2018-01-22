<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Anak extends CI_Controller {
	public function tambahkan(){
		$idKaryawan 	= $_POST['idKaryawan'];
		$namaAnak 		= $_POST['namaAnak'];
		$jenisKelamin 	= $_POST['jenisKelamin'];
		$tglLahir 		= $_POST['tglLahir'];
		$rubah 			= date_format(date_create($tglLahir), 'Y');
		$thn_skrg 		= date('Y');
		$usia 			= $thn_skrg - $rubah;
		$data = array(
				'idAnak'		=> "",
				'idKaryawan' 	=> $idKaryawan,
				'namaAnak' 		=> $namaAnak,
				'jenisKelamin'	=> $jenisKelamin,
				'tglLahir'		=> $tglLahir,
				'umur'			=> $usia,
				);
		$add = $this->db->insert('tbl_anak',$data);
		if($add >= 1){
			redirect("karyawan/tambah_info/anak/$idKaryawan");
		}
	}
	public function hapus($idKaryawan){
		$where_idKaryawan = array('idKaryawan' => $idKaryawan);
		$jumlah_baris = $this->db->count_all_results('tbl_anak',$where_idKaryawan);
		for($i=1; $i<=$jumlah_baris; $i++){
			if (isset($_POST['cek_'.$i])) {
				$where_idAnak = array('idAnak' => $_POST['cek_'.$i]);
				$data = $this->db->Delete('tbl_anak',$where_idAnak);	
			}
		}
		redirect("karyawan/tambah_info/anak/$idKaryawan");	
	}
	public function edit($idAnak){
		$d = $this->model->GetData("tbl_anak where idAnak = '$idAnak'");
		$idKaryawan = $d[0]['idKaryawan'];
		$c = $this->model->GetData("tbl_karyawan where idKaryawan = '$idKaryawan'");
		$data = array(
			'idKaryawan'		=> $d[0]['idKaryawan'] ,
			'namaLengkap' 		=> $c[0]['namaLengkap'] ,
			'statusKerja' 		=> $c[0]['statusKerja'],
			'idAnak' 			=> $d[0]['idAnak'],
			'namaAnak'	 		=> $d[0]['namaAnak'],
			'jenisKelamin'	 	=> $d[0]['jenisKelamin'],
			'tglLahir' 			=> $d[0]['tglLahir'],
			);
		$data_organisasi = $this->model->GetData("tbl_organisasi ORDER BY idOrg ASC");
		$data_jabatan = $this->model->GetData("tbl_jabatan ORDER BY idJabatan ASC");
		$this->load->view('nav',array('data_organisasi' => $data_organisasi,'data_jabatan' => $data_jabatan));
		$this->load->view('form_edit_anak',$data);
	}
	public function editkan($idAnak){
		$idKaryawan 	= $_POST['idKaryawan'];
		$namaAnak 		= $_POST['namaAnak'];
		$jenisKelamin 	= $_POST['jenisKelamin'];
		$tglLahir	 	= $_POST['tglLahir'];
		$rubah 			= date_format(date_create($tglLahir), 'Y');
		$thn_skrg 		= date('Y');
		$usia 			= $thn_skrg - $rubah;

		$data = array(
			'idKaryawan' 	=> $idKaryawan,
			'namaAnak'		=> $namaAnak,
			'jenisKelamin' 	=> $jenisKelamin,
			'tglLahir' 		=> $tglLahir,
			'umur' 			=> $usia,
		);

		$where = array('idAnak' => $idAnak);
		
		$res = $this->db->update('tbl_anak',$data,$where);

		if($res >= 1){
			redirect("karyawan/tambah_info/anak/$idKaryawan");
		}		
	}
}
