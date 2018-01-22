<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Penghargaan extends CI_Controller {
	public function tambahkan(){
		$idKaryawan 		= $_POST['idKaryawan'];
		$namaPenghargaan	= $_POST['namaPenghargaan'];
		$penyelenggara 		= $_POST['penyelenggara'];
		$kota		 		= $_POST['kota'];
		$tahun			 	= $_POST['tahun'];

		$data = array(
			'idKaryawan'			=>$idKaryawan,
			'idKaryPenghargaan'		=> "",
			'namaPenghargaan' 		=> $namaPenghargaan,
			'penyelenggara'			=> $penyelenggara,
			'kota' 					=> $kota,
			'tahun' 				=> $tahun,
		);
		$add = $this->db->insert('tbl_karypenghargaan',$data);
		if($add >= 1){
			redirect("karyawan/tambah_info/penghargaan/$idKaryawan");
		}
	}
	public function hapus($idKaryawan){
		$where_idKaryawan = array('idKaryawan' => $idKaryawan);
		$jumlah_baris = $this->db->count_all_results('tbl_karypenghargaan',$where_idKaryawan);
		for($i=1; $i<=$jumlah_baris; $i++){
			if (isset($_POST['cek_'.$i])) {
				$where = array('idKaryPenghargaan' => $_POST['cek_'.$i]);
				$data = $this->db->Delete('tbl_karypenghargaan',$where);	
			}
		}
		redirect("karyawan/tambah_info/penghargaan/$idKaryawan");	
	}
	public function edit($idKaryPenghargaan){
		$d = $this->model->GetData("tbl_karypenghargaan where idKaryPenghargaan = '$idKaryPenghargaan'");
		$idKaryawan = $d[0]['idKaryawan'];
		$c = $this->model->GetData("tbl_karyawan where idKaryawan = '$idKaryawan'");
		$data = array(
			'idKaryawan'		=> $d[0]['idKaryawan'] ,
			'namaLengkap' 		=> $c[0]['namaLengkap'] ,
			'statusKerja' 		=> $c[0]['statusKerja'],
			'idKaryPenghargaan'	=> $d[0]['idKaryPenghargaan'],
			'namaPenghargaan'	=> $d[0]['namaPenghargaan'],
			'penyelenggara'		=> $d[0]['penyelenggara'],
			'kota'		 		=> $d[0]['kota'],
			'tahun'		 		=> $d[0]['tahun'],
			);
		$data_organisasi = $this->model->GetData("tbl_organisasi ORDER BY idOrg ASC");
		$data_jabatan = $this->model->GetData("tbl_jabatan ORDER BY idJabatan ASC");
		$this->load->view('nav',array('data_organisasi' => $data_organisasi,'data_jabatan' => $data_jabatan));
		$this->load->view('form_edit_penghargaan',$data);
	}
	public function editkan($idKaryPenghargaan){
		$idKaryawan 		= $_POST['idKaryawan'];
		$namaPenghargaan	= $_POST['namaPenghargaan'];
		$penyelenggara 		= $_POST['penyelenggara'];
		$kota		 		= $_POST['kota'];
		$tahun			 	= $_POST['tahun'];

		$data = array(
			'idKaryawan'			=>$idKaryawan,
			'namaPenghargaan' 		=> $namaPenghargaan,
			'penyelenggara'			=> $penyelenggara,
			'kota' 					=> $kota,
			'tahun' 				=> $tahun,
		);

		$where = array('idKaryPenghargaan' => $idKaryPenghargaan);
		
		$res = $this->db->update('tbl_karypenghargaan',$data,$where);

		if($res >= 1){
			redirect("karyawan/tambah_info/penghargaan/$idKaryawan");
		}		
	}
}
