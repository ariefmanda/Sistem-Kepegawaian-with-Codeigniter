<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cari extends CI_Controller {

	public function tampil(){
		$data_organisasi = $this->model->GetData("tbl_organisasi ORDER BY idOrg ASC");
		$data_jabatan = $this->model->GetData("tbl_jabatan ORDER BY idJabatan ASC");
		$this->load->view('nav',array('data_organisasi' => $data_organisasi,'data_jabatan' => $data_jabatan));

		$namaLengkap = $this->input->get('namaLengkap');
		$idOrg = $this->input->get('Org');
		$idDept = $this->input->get('Dept');
		$idJabatan = $this->input->get('Jabatan');
		$statusKerja = $this->input->get('statusKerja');
		$jenisKelamin = $this->input->get('jenisKelamin');
		$umur = $this->input->get('umur');
		$pilih_umur = $this->input->get('pilih_umur');
		$pager = 0;
        $no=1;
        $page=0;
        $where ="";
        $batasawal = 5;
        $info_where = "&where=";
        $info_show  = "&show=";
        if(!empty($_GET['where'])){
            $where = "AND tbl_karyawan.namaLengkap like '%".$_GET['where']."%'";
            $info_where = "&where=".$_GET['where'];
        }
        if(!empty($_GET['show'])){
            $batasawal = $_GET['show'];
            $info_show = "&show=".$_GET['show'];
        }
        if(!empty($_GET['pager'])){
            $pager = $_GET['pager'];
            if($_GET['pager']>=1){
                $no = $_GET['pager']*$batasawal+1; 
                $page = $_GET['pager']*$batasawal;
            }
        }
        $a = explode(".", $no / $batasawal);
        $b = $a[0];
        $prev = $pager-1;

		$data = $this->model->GetD("tbl_karyawan.idKaryawan, tbl_karyawan.namaLengkap, tbl_karyawan.jenisKelamin, tbl_pekerjaan.idPekerjaan, tbl_pekerjaan.idKaryawan, tbl_pekerjaan.idOrg, tbl_organisasi.namaOrg, tbl_jabatan.namaJabatan, tbl_karyawan.tglLahir, tbl_karyawan.usia,tbl_departemen.idDept,tbl_departemen.namaDept, tbl_karyawan.statusKerja, tbl_karyawan.namaFoto
			FROM tbl_karyawan 
			JOIN tbl_pekerjaan ON tbl_karyawan.idKaryawan = tbl_pekerjaan.idKaryawan
			JOIN tbl_organisasi ON tbl_organisasi.idOrg = tbl_pekerjaan.idOrg
			JOIN tbl_jabatan ON tbl_jabatan.idJabatan = tbl_pekerjaan.idJabatan
			JOIN tbl_departemen ON tbl_departemen.idDept = tbl_pekerjaan.idDept
			where tbl_karyawan.namaLengkap like '%$namaLengkap%' 
			AND tbl_pekerjaan.idOrg LIKE '%$idOrg%'
			AND tbl_pekerjaan.idDept LIKE '%$idDept%'
			AND tbl_pekerjaan.idJabatan LIKE '%$idJabatan%'
			AND tbl_karyawan.statusKerja LIKE '%$statusKerja%'
			AND tbl_karyawan.usia $pilih_umur $umur
			AND tbl_karyawan.jenisKelamin LIKE '%$jenisKelamin%'
			$where
			ORDER by tbl_karyawan.idKaryawan asc LIMIT ".$page.",".$batasawal);
		if(empty($statusKerja)){
			$statusKerja = 'aktif';
		}
		$this->load->view('tampil_karyawan',array('data' => $data,'status' => $statusKerja,'prev' => $prev, 'pager' => $pager, 'batasawal' => $batasawal, 'info_show' => $info_show, 'info_where' => $info_where, 'b' => $b));
	}
	public function karyawan($pilih){
		$cari= $this->input->get('input_cari');
		$data_organisasi = $this->model->GetData("tbl_organisasi ORDER BY idOrg ASC");
		$data_jabatan = $this->model->GetData("tbl_jabatan ORDER BY idJabatan ASC");
		$this->load->view('nav',array('data_organisasi' => $data_organisasi,'data_jabatan' => $data_jabatan));
		$data = $this->model->GetD("tbl_karyawan.idKaryawan, tbl_karyawan.namaLengkap, tbl_karyawan.jenisKelamin, tbl_pekerjaan.idPekerjaan, tbl_pekerjaan.idKaryawan, tbl_pekerjaan.idOrg, tbl_organisasi.namaOrg, tbl_jabatan.namaJabatan, tbl_karyawan.tglLahir, tbl_karyawan.usia, tbl_karyawan.statusKerja, tbl_karyawan.namaFoto
			FROM tbl_karyawan JOIN tbl_pekerjaan ON tbl_karyawan.idKaryawan = tbl_pekerjaan.idKaryawan
			JOIN tbl_organisasi ON tbl_organisasi.idOrg = tbl_pekerjaan.idOrg
			JOIN tbl_jabatan ON tbl_jabatan.idJabatan = tbl_pekerjaan.idJabatan
			where tbl_karyawan.statusKerja = 'aktif' and tbl_karyawan.namaLengkap like '%$cari%' ORDER by tbl_karyawan.idKaryawan asc");
		$this->load->view('tampil_pilih_karyawan',array('data' => $data,'pilih' => $pilih));
	}
}
