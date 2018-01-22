<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Referensi extends CI_Controller {
	public function tambahkan(){
		$idKaryawan 	= $_POST['idKaryawan'];
		$namaRef 		= $_POST['namaRef'];
		$relasi		 	= $_POST['relasi'];
		$alamat 		= $_POST['alamat'];
		$telp	 		= $_POST['telp'];

		$data = array(
				'idKaryawan' 			=> $idKaryawan,
				'idKaryRefKeluarga'		=> "",
				'namaRef' 				=> $namaRef,
				'relasi'				=> $relasi,
				'alamat'				=> $alamat,
				'telp'					=> $telp,
				);
		$add = $this->db->insert('tbl_karyrefkeluarga',$data);
		if($add >= 1){
			redirect("karyawan/tambah_info/referensi/$idKaryawan");
		}
	}
	public function hapus($idKaryawan){
		$where_idKaryawan = array('idKaryawan' => $idKaryawan);
		$jumlah_baris = $this->db->count_all_results('tbl_karyrefkeluarga',$where_idKaryawan);
		for($i=1; $i<=$jumlah_baris; $i++){
			if (isset($_POST['cek_'.$i])) {
				$where_id = array('idKaryRefKeluarga' => $_POST['cek_'.$i]);
				$data = $this->db->Delete('tbl_karyrefkeluarga',$where_id);	
			}
		}
		redirect("karyawan/tambah_info/referensi/$idKaryawan");	
	}
	public function edit($idKaryRefKeluarga){
		$d = $this->model->GetData("tbl_karyrefkeluarga where idKaryRefKeluarga = '$idKaryRefKeluarga'");
		$idKaryawan = $d[0]['idKaryawan'];
		$c = $this->model->GetData("tbl_karyawan where idKaryawan = '$idKaryawan'");
		$data = array(
			'idKaryRefKeluarga' => $idKaryRefKeluarga,
			'idKaryawan'		=> $d[0]['idKaryawan'] ,
			'namaLengkap' 		=> $c[0]['namaLengkap'] ,
			'statusKerja' 		=> $c[0]['statusKerja'],
			'namaRef' 			=> $d[0]['namaRef'],
			'relasi'	 		=> $d[0]['relasi'],
			'alamat'		 	=> $d[0]['alamat'],
			'telp' 				=> $d[0]['telp'],
			);
		$data_organisasi = $this->model->GetData("tbl_organisasi ORDER BY idOrg ASC");
		$data_jabatan = $this->model->GetData("tbl_jabatan ORDER BY idJabatan ASC");
		$this->load->view('nav',array('data_organisasi' => $data_organisasi,'data_jabatan' => $data_jabatan));
		$this->load->view('form_edit_referensi',$data);
	}
	public function editkan($idKaryRefKeluarga){
		$idKaryawan 		= $_POST['idKaryawan'];
		$namaRef 		= $_POST['namaRef'];
		$relasi		 	= $_POST['relasi'];
		$alamat 		= $_POST['alamat'];
		$telp	 		= $_POST['telp'];

		$data = array(
			'namaRef' 				=> $namaRef,
			'relasi'				=> $relasi,
			'alamat'				=> $alamat,
			'telp'					=> $telp,
		);

		$where = array('idKaryRefKeluarga' => $idKaryRefKeluarga);
		
		$res = $this->db->update('tbl_karyrefkeluarga',$data,$where);

		if($res >= 1){
			redirect("karyawan/tambah_info/referensi/$idKaryawan");
		}		
	}
}
