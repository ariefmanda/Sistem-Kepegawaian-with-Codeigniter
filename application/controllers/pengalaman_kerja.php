<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengalaman_kerja extends CI_Controller {
	public function tambahkan(){
		$idKaryawan 		= $_POST['idKaryawan'];
		$perusahaan 		= $_POST['perusahaan'];
		$kota		 		= $_POST['kota'];
		$JabatanTerakhir 	= $_POST['JabatanTerakhir'];
		$GajiTerakhir	 	= $_POST['GajiTerakhir'];
		$MasaKerja 			= $_POST['MasaKerja'];

		$data = array(
			'idKaryawan'		=>$idKaryawan,
			'idKaryPengKerja'	=> "",
			'perusahaan' 		=> $perusahaan,
			'kota' 				=> $kota,
			'JabatanTerakhir'	=> $JabatanTerakhir,
			'GajiTerakhir'		=> $GajiTerakhir,
			'MasaKerja'			=> $MasaKerja,
		);
		$add = $this->db->insert('tbl_karypengkerja',$data);
		if($add >= 1){
			redirect("karyawan/tambah_info/pengalaman_kerja/$idKaryawan");
		}
	}
	public function hapus($idKaryawan){
		$where_idKaryawan = array('idKaryawan' => $idKaryawan);
		$jumlah_baris = $this->db->count_all_results('tbl_karypengkerja',$where_idKaryawan);
		for($i=1; $i<=$jumlah_baris; $i++){
			if (isset($_POST['cek_'.$i])) {
				$where = array('idKaryPengKerja' => $_POST['cek_'.$i]);
				$data = $this->db->Delete('tbl_karypengkerja',$where);	
			}
		}
		redirect("karyawan/tambah_info/pengalaman_kerja/$idKaryawan");	
	}
	public function edit($idKaryPengKerja){
		$d = $this->model->GetData("tbl_karypengkerja where idKaryPengKerja = '$idKaryPengKerja'");
		$idKaryawan = $d[0]['idKaryawan'];
		$c = $this->model->GetData("tbl_karyawan where idKaryawan = '$idKaryawan'");
		$data = array(
			'idKaryawan'		=> $d[0]['idKaryawan'] ,
			'namaLengkap' 		=> $c[0]['namaLengkap'] ,
			'statusKerja' 		=> $c[0]['statusKerja'],
			'idKaryPengKerja' 	=> $d[0]['idKaryPengKerja'],
			'perusahaan' 		=> $d[0]['perusahaan'],
			'kota'		 		=> $d[0]['kota'],
			'JabatanTerakhir' 	=> $d[0]['JabatanTerakhir'],
			'GajiTerakhir' 		=> $d[0]['GajiTerakhir'],
			'MasaKerja'		 	=> $d[0]['MasaKerja'],
			);
		$data_organisasi = $this->model->GetData("tbl_organisasi ORDER BY idOrg ASC");
		$data_jabatan = $this->model->GetData("tbl_jabatan ORDER BY idJabatan ASC");
		$this->load->view('nav',array('data_organisasi' => $data_organisasi,'data_jabatan' => $data_jabatan));
		$this->load->view('form_edit_pengalaman_kerja',$data);
	}
	public function editkan($idKaryPengKerja){
		$idKaryawan 		= $_POST['idKaryawan'];
		$perusahaan 		= $_POST['perusahaan'];
		$kota		 		= $_POST['kota'];
		$JabatanTerakhir 	= $_POST['JabatanTerakhir'];
		$GajiTerakhir	 	= $_POST['GajiTerakhir'];
		$MasaKerja 			= $_POST['MasaKerja'];

		$data = array(
			'idKaryawan'		=>$idKaryawan,
			'perusahaan' 		=> $perusahaan,
			'kota' 				=> $kota,
			'JabatanTerakhir'	=> $JabatanTerakhir,
			'GajiTerakhir'		=> $GajiTerakhir,
			'MasaKerja'			=> $MasaKerja,
		);

		$where = array('idKaryPengKerja' => $idKaryPengKerja);
		
		$res = $this->db->update('tbl_karypengkerja',$data,$where);

		if($res >= 1){
			redirect("karyawan/tambah_info/pengalaman_kerja/$idKaryawan");
		}		
	}
}
