<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class pengalaman_tugas extends CI_Controller {
	public function tambahkan(){
		$idKaryawan 		= $_POST['idKaryawan'];
		$namaPerusahaan		= $_POST['namaPerusahaan'];
		$Kegiatan 			= $_POST['Kegiatan'];
		$kota		 		= $_POST['kota'];
		$tahun			 	= $_POST['tahun'];

		$data = array(
			'idKaryawan'		=>$idKaryawan,
			'idKaryPengTugas'	=> "",
			'namaPerusahaan' 	=> $namaPerusahaan,
			'Kegiatan'			=> $Kegiatan,
			'kota' 				=> $kota,
			'tahun' 				=> $tahun,
		);
		$add = $this->db->insert('tbl_karypengtugas',$data);
		if($add >= 1){
			redirect("karyawan/tambah_info/pengalaman_tugas/$idKaryawan");
		}
	}
	public function hapus($idKaryawan){
		$where_idKaryawan = array('idKaryawan' => $idKaryawan);
		$jumlah_baris = $this->db->count_all_results('tbl_karypengtugas',$where_idKaryawan);
		for($i=1; $i<=$jumlah_baris; $i++){
			if (isset($_POST['cek_'.$i])) {
				$where = array('idKaryPengTugas' => $_POST['cek_'.$i]);
				$data = $this->db->Delete('tbl_karypengtugas',$where);	
			}
		}
		redirect("karyawan/tambah_info/pengalaman_tugas/$idKaryawan");	
	}
	public function edit($idKaryPengTugas){
		$d = $this->model->GetData("tbl_karypengtugas where idKaryPengTugas = '$idKaryPengTugas'");
		$idKaryawan = $d[0]['idKaryawan'];
		$c = $this->model->GetData("tbl_karyawan where idKaryawan = '$idKaryawan'");
		$data = array(
			'idKaryawan'		=> $d[0]['idKaryawan'] ,
			'namaLengkap' 		=> $c[0]['namaLengkap'] ,
			'statusKerja' 		=> $c[0]['statusKerja'],
			'idKaryPengTugas' 	=> $d[0]['idKaryPengTugas'],
			'namaPerusahaan'	=> $d[0]['namaPerusahaan'],
			'Kegiatan'		 	=> $d[0]['Kegiatan'],
			'kota'		 		=> $d[0]['kota'],
			'tahun'		 		=> $d[0]['tahun'],
			);
		$data_organisasi = $this->model->GetData("tbl_organisasi ORDER BY idOrg ASC");
		$data_jabatan = $this->model->GetData("tbl_jabatan ORDER BY idJabatan ASC");
		$this->load->view('nav',array('data_organisasi' => $data_organisasi,'data_jabatan' => $data_jabatan));
		$this->load->view('form_edit_pengalaman_tugas',$data);
	}
	public function editkan($idKaryPengTugas){
		$idKaryawan 		= $_POST['idKaryawan'];
		$namaPerusahaan		= $_POST['namaPerusahaan'];
		$Kegiatan 			= $_POST['Kegiatan'];
		$kota		 		= $_POST['kota'];
		$tahun			 	= $_POST['tahun'];

		$data = array(
			'idKaryawan'		=>$idKaryawan,
			'namaPerusahaan' 	=> $namaPerusahaan,
			'Kegiatan'			=> $Kegiatan,
			'kota' 				=> $kota,
			'tahun' 			=> $tahun,
		);

		$where = array('idKaryPengTugas' => $idKaryPengTugas);
		
		$res = $this->db->update('tbl_karypengtugas',$data,$where);

		if($res >= 1){
			redirect("karyawan/tambah_info/pengalaman_tugas/$idKaryawan");
		}		
	}
}
