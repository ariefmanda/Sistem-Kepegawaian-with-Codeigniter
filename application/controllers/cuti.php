<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cuti extends CI_Controller {

	public function form(){
		$data_organisasi = $this->model->GetData("tbl_organisasi");
		$data_jabatan = $this->model->GetData("tbl_jabatan");
		$this->load->view('nav',array('data_organisasi' => $data_organisasi,'data_jabatan' => $data_jabatan));	
		$this->load->view('form_cuti');
	}

	public function tampilCuti(){
		$data_organisasi = $this->model->GetData("tbl_organisasi ORDER BY idOrg ASC");
		$data_jabatan = $this->model->GetData("tbl_jabatan ORDER BY idJabatan ASC");
		$this->load->view('nav',array('data_organisasi' => $data_organisasi,'data_jabatan' => $data_jabatan));
		if($this->session->userdata('level') == 'user'){
			$id = $this->session->userdata('id');
			$c = $this->model->GetData("tbl_cuti where idKaryawan = '$id'");
			$d = $this->model->GetData("tbl_karyawan where idKaryawan = '$id'");
			$info = '';
			if(!empty($_GET['data'])){
				$info = 'Melebihi Batas Cuti Yang Telah Ditentukan';
			}
			$data = array(
					'idKaryawan' 		=> $d[0]['idKaryawan'] ,
					'namaLengkap' 		=> $d[0]['namaLengkap'] ,
					'statusKerja' 		=> $d[0]['statusKerja'],
					'c' => $c,
					'info'				=> $info,
				);
			$this->load->view('tampil_cuti',$data);
		} else if ($this->session->userdata('level') == 'admin'){
			$data = $this->model->GetD("tbl_karyawan.idKaryawan, tbl_karyawan.namaLengkap, tbl_karyawan.jenisKelamin, tbl_pekerjaan.idPekerjaan, tbl_pekerjaan.idKaryawan, tbl_pekerjaan.idOrg, tbl_organisasi.namaOrg, tbl_jabatan.namaJabatan, tbl_cuti.idCuti, tbl_cuti.proses, tbl_cuti.mulaiCuti,tbl_departemen.idDept,tbl_departemen.namaDept, tbl_cuti.jumlahHari, tbl_cuti.keterangan
				FROM tbl_cuti JOIN tbl_karyawan ON tbl_cuti.idKaryawan = tbl_karyawan.idKaryawan
				JOIN tbl_pekerjaan ON tbl_karyawan.idKaryawan = tbl_pekerjaan.idKaryawan
				JOIN tbl_organisasi ON tbl_organisasi.idOrg = tbl_pekerjaan.idOrg
				JOIN tbl_jabatan ON tbl_jabatan.idJabatan = tbl_pekerjaan.idJabatan
				JOIN tbl_departemen ON tbl_departemen.idDept = tbl_pekerjaan.idDept
				ORDER by tbl_cuti.idCuti asc");
			$this->load->view('tampil_setuju_cuti',array('data' => $data));
		}
	}
	public function tambahkanCuti(){
		$idKaryawan 	= $this->session->userdata('id');
		$mulaiCuti 		= $_POST['mulaiCuti'];
		$jumlahHari 	= $_POST['jumlahHari'];
		$keterangan 	= $_POST['keterangan'];
		$proses 		= "Menunggu";
		$d = $this->model->GetData("tbl_cuti where idKaryawan = '$idKaryawan'");
		$jumlahTotCuti1 = 0;
		$jumlahTotCuti2 = 0;
		$jum = date_format(date_create($mulaiCuti), 'm') - date_format(date_create('2000-01-01'), 'm');
		foreach ($d as $i) {
			$sisa = date_format(date_create($i['mulaiCuti']), 'm') - date_format(date_create('2000-01-01'), 'm');
			if($sisa <= 6){
				$jumlahTotCuti1 = $i['jumlahHari'] + $jumlahTotCuti1;
			} else {
				$jumlahTotCuti2 = $i['jumlahHari'] + $jumlahTotCuti2;
			}
		}
		if($jum <= 6 && ($jumlahTotCuti1+$jumlahHari) >= 7){
			redirect("cuti/tampilCuti?data=1");
		} else if($jum <= 12 && ($jumlahTotCuti2+$jumlahHari) >= 7){
			redirect("cuti/tampilCuti?data=1");
		} else {
			$data = array(
					'idCuti'		=> "",
					'idKaryawan' 	=> $idKaryawan,
					'mulaiCuti' 	=> $mulaiCuti,
					'jumlahHari'	=> $jumlahHari,
					'proses'	=> $proses,
					'keterangan'	=> $keterangan,
					);
			$add = $this->db->insert('tbl_cuti',$data);
			redirect("cuti/tampilCuti");
		}
	}

	// public function tambahkan(){
	// 	$idKaryawan 	= $_POST['idKaryawan'];
	// 	$mulaiCuti 		= $_POST['mulaiCuti'];
	// 	$jumlahHari 	= $_POST['jumlahHari'];
	// 	$keterangan 	= $_POST['keterangan'];
	// 	$proses 		= "Belum disetujui";
	// 	$d = $this->model->GetData("tbl_cuti where idKaryawan = '$idKaryawan'");
	// 	$jumlahTotCuti1 = 0;
	// 	$jumlahTotCuti2 = 0;
	// 	$jum = date_format(date_create($mulaiCuti), 'm') - date_format(date_create('2000-01-01'), 'm');
	// 	foreach ($d as $i) {
	// 		$sisa = date_format(date_create($i['mulaiCuti']), 'm') - date_format(date_create('2000-06-01'), 'm');
	// 		if($sisa <= 6){
	// 			$jumlahTotCuti1 = $i['jumlahHari'] + $jumlahTotCuti1;
	// 		} else {
	// 			$jumlahTotCuti2 = $i['jumlahHari'] + $jumlahTotCuti2;
	// 		}
	// 	}

	// 	if($jum <= 6 && ($jumlahTotCuti1+$jumlahHari) >= 7){
	// 		$c = $this->model->GetData("tbl_cuti where idKaryawan = '$idKaryawan'");
	// 		$d = $this->model->GetData("tbl_karyawan where idKaryawan = '$idKaryawan'");
	// 		$data_organisasi = $this->model->GetData("tbl_organisasi ORDER BY idOrg ASC");
	// 		$data_jabatan = $this->model->GetData("tbl_jabatan ORDER BY idJabatan ASC");
	// 		$data = array(
	// 			'idKaryawan' 		=> $d[0]['idKaryawan'] ,
	// 			'namaLengkap' 		=> $d[0]['namaLengkap'] ,
	// 			'statusKerja' 		=> $d[0]['statusKerja'],
	// 			'c' => $c,
	// 			'info' => 'Melebihi Batas Hari Yang Di Tentukan ',
	// 		);
	// 		$this->load->view('nav',array('data_organisasi' => $data_organisasi,'data_jabatan' => $data_jabatan));
	// 		$this->load->view('tampil_cuti',$data);

	// 	} else if($jum <= 12 && ($jumlahTotCuti2+$jumlahHari) >= 7){
	// 		$c = $this->model->GetData("tbl_cuti where idKaryawan = '$idKaryawan'");
	// 		$d = $this->model->GetData("tbl_karyawan where idKaryawan = '$idKaryawan'");
	// 		$data_organisasi = $this->model->GetData("tbl_organisasi ORDER BY idOrg ASC");
	// 		$data_jabatan = $this->model->GetData("tbl_jabatan ORDER BY idJabatan ASC");
	// 		$data = array(
	// 			'idKaryawan' 		=> $d[0]['idKaryawan'] ,
	// 			'namaLengkap' 		=> $d[0]['namaLengkap'] ,
	// 			'statusKerja' 		=> $d[0]['statusKerja'],
	// 			'c' => $c,
	// 			'info' => 'Melebihi Batas Hari Yang Di Tentukan ',
	// 		);
	// 		$this->load->view('nav',array('data_organisasi' => $data_organisasi,'data_jabatan' => $data_jabatan));
	// 		$this->load->view('tampil_cuti',$data);
	// 	} else {
	// 		$data = array(
	// 				'idCuti'		=> "",
	// 				'idKaryawan' 	=> $idKaryawan,
	// 				'mulaiCuti' 	=> $mulaiCuti,
	// 				'jumlahHari'	=> $jumlahHari,
	// 				'keterangan'	=> $keterangan,
	// 				'proses'		=> $proses,
	// 				);
	// 		$add = $this->db->insert('tbl_cuti',$data);
	// 		if($add >= 1){
	// 			redirect("cuti/tampil/$idKaryawan");
	// 		}
	// 	}
	// }
	public function hapus(){
	 	$where_idKaryawan = array('idKaryawan' => $this->session->userdata('id'));
	 	$jumlah_baris = $this->db->count_all_results('tbl_cuti',$where_idKaryawan);
	 	for($i=1; $i<=$jumlah_baris; $i++){
	 		if (isset($_POST['cek_'.$i])) {
	 			$where_cuti = array('idCuti' => $_POST['cek_'.$i]);
	 			$data = $this->db->Delete('tbl_cuti',$where_cuti);	
	 		}
	 	}
	 	redirect("cuti/tampilCuti");	
	}
	public function PDF($idCuti,$idKaryawan,$proses){
		if($idKaryawan!==$this->session->userdata('id'))
		{
			redirect("cuti/tampilCuti");
		} else {
			if($proses!=="Disetujui"){
				redirect("cuti/tampilCuti");
			}
			else{
		include "fpdf/fpdf.php";
		$d = $this->model->GetD("tbl_karyawan.idKaryawan, tbl_karyawan.namaLengkap, tbl_karyawan.jenisKelamin, tbl_karyawan.contohBlob,tbl_pekerjaan.idPekerjaan, tbl_pekerjaan.idKaryawan, tbl_pekerjaan.idOrg, tbl_organisasi.idOrg, tbl_organisasi.namaOrg, tbl_jabatan.namaJabatan,tbl_departemen.idDept,tbl_departemen.namaDept, tbl_jabatan.idJabatan, tbl_cuti.idCuti, tbl_cuti.proses, tbl_cuti.mulaiCuti, tbl_cuti.jumlahHari, tbl_cuti.keterangan
			FROM tbl_cuti 
			JOIN tbl_karyawan ON tbl_cuti.idKaryawan = tbl_karyawan.idKaryawan
			JOIN tbl_pekerjaan ON tbl_karyawan.idKaryawan = tbl_pekerjaan.idKaryawan
			JOIN tbl_organisasi ON tbl_organisasi.idOrg = tbl_pekerjaan.idOrg
			JOIN tbl_jabatan ON tbl_jabatan.idJabatan = tbl_pekerjaan.idJabatan
			JOIN tbl_departemen ON tbl_departemen.idDept = tbl_pekerjaan.idDept
			where tbl_cuti.idCuti='$idCuti' ORDER by tbl_cuti.idCuti asc");
		
		$e = $this->model->GetData("tbl_cuti where idKaryawan= '$idKaryawan'");

		if($d[0]['idKaryawan']!==$this->session->userdata('id')){
			redirect("cuti/tampilCuti");
		}else{
			if($d[0]['proses']!=="Disetujui"){
				redirect("cuti/tampilCuti");
			}
			else{
				$pdf = new FPDF();
		$pdf->AddPage();

		$pdf->SetFont('Arial','B',16);
		$pdf->cell(0,5,'DATA CUTI KARYAWAN','0','1','C',false);
		$pdf->Ln(3);
		$pdf->cell(190,0.6,'','0','2','C',true);
		$pdf->SetFont('Arial','',10);
		$pdf->Ln(6);
		$pdf->Cell(50,0,'Organisasi',0,0,'L');
		$pdf->Cell(5,0,':',0,0,'C');
		$pdf->Cell(50,0,$d[0]['namaOrg'],0,0,'L');
		$pdf->Cell(20,0,'Foto',0,0,'L');
		$pdf->Cell(5,0,':',0,0,'C');
		$finfo = new finfo(FILEINFO_MIME_TYPE);
	  	$mime = $finfo->buffer($d[0]['contohBlob']);
	  	$xt='.jpg';
	  	if (strpos($mime, 'png') > 0) {
	  		$xt='.png';	
	  	}
		$pdf->Image("http://localhost/suara_merdeka/user/tampil_gambar/$idKaryawan".$xt,142,23,50,50);
		$pdf->Ln(5);
		$pdf->Cell(50,0,'Departemen',0,0,'L');
		$pdf->Cell(5,0,':',0,0,'C');
		$pdf->Cell(50,0,$d[0]['namaDept'],0,0,'L');
		$pdf->Ln(5);
		$pdf->Cell(50,0,'Jabatan',0,0,'L');
		$pdf->Cell(5,0,':',0,0,'C');
		$pdf->Cell(150,0,$d[0]['namaJabatan'],0,0,'L');
		$pdf->Ln(5);
		$pdf->Cell(50,0,'Nama Lengkap',0,0,'L');
		$pdf->Cell(5,0,':',0,0,'C');
		$pdf->Cell(150,0,$d[0]['namaLengkap'],0,0,'L');
		$pdf->Ln(5);
		$pdf->Cell(50,0,'Mulai Cuti',0,0,'L');
		$pdf->Cell(5,0,':',0,0,'C');
		$pdf->Cell(150,0,$d[0]['mulaiCuti'].'(YYYY/MM/DD)',0,0,'L');
		$pdf->Ln(5);
		$pdf->Cell(50,0,'Jumlah Hari',0,0,'L');
		$pdf->Cell(5,0,':',0,0,'C');
		$pdf->Cell(150,0,$d[0]['jumlahHari'],0,0,'L');
		$pdf->Ln(5);
		$pdf->Cell(50,0,'Keterangan Cuti',0,0,'L');
		$pdf->Cell(5,0,':',0,0,'C');
		$pdf->Cell(150,0,$d[0]['keterangan'],0,0,'L');
		$pdf->Ln(5);
		$pdf->Cell(50,0,'Proses Cuti',0,0,'L');
		$pdf->Cell(5,0,':',0,0,'C');
		$pdf->Cell(150,0,$d[0]['proses'],0,0,'L');
		$pdf->Ln(30);
		$pdf->Cell(300,0,'Diketahui',0,0,'C');
		$pdf->Ln(40);
		$pdf->Cell(305,0,'(____________________)',0,0,'C');
		$pdf->Ln(40);
		$pdf->SetFont('Arial','B',14);
		$pdf->cell(0,5,'Sejarah Cuti','0','1','L',false);
		$pdf->Ln(3);
		$pdf->cell(190,0.6,'','0','2','C',true);
		$pdf->SetFont('Arial','',10);
		$pdf->Ln(5);
		$pdf->Cell(50,0,'Mulai Cuti',0,0,'C');
        $pdf->Cell(30,0,'Jumlah Hari',0,0,'C');
        $pdf->Cell(70,0,'Keterangan Cuti',0,0,'L');
        $pdf->Cell(50,0,'Proses Konfirmasi',0,0,'L');
        $pdf->Ln(3);
		$no=1;
        foreach ($e as $f) {
		$pdf->Ln(5);
		$pdf->Cell(50,0,$f['mulaiCuti'].'(YYYY/MM/DD)',0,0,'L');
		$pdf->Cell(30,0,$f['jumlahHari'],0,0,'C');
		$pdf->Cell(70,0,$f['keterangan'],0,0,'L');
		$pdf->Cell(30,0,$f['proses'],0,0,'C');
         $no++;
        }
		$pdf->output();
			}
		}

		
			}
		}
	}
	public function proses($idCuti,$proses){
			$data = array(
			'proses' => $proses,
			);
			$where = array('idCuti' => $idCuti);
			$this->db->update('tbl_cuti',$data,$where);	
			redirect("cuti/tampilCuti?page=".$_GET['page']);
	}

	public function cari(){
		$cari= $this->input->get('input_cari');
		$data_organisasi = $this->model->GetData("tbl_organisasi ORDER BY idOrg ASC");
		$data_jabatan = $this->model->GetData("tbl_jabatan ORDER BY idJabatan ASC");
		$this->load->view('nav',array('data_organisasi' => $data_organisasi,'data_jabatan' => $data_jabatan));
		$data = $this->model->GetD("tbl_karyawan.idKaryawan, tbl_karyawan.namaLengkap, tbl_karyawan.jenisKelamin, tbl_pekerjaan.idPekerjaan, tbl_pekerjaan.idKaryawan, tbl_pekerjaan.idOrg, tbl_organisasi.namaOrg, tbl_jabatan.namaJabatan, tbl_cuti.idCuti, tbl_cuti.proses, tbl_cuti.mulaiCuti,tbl_departemen.idDept,tbl_departemen.namaDept, tbl_cuti.jumlahHari, tbl_cuti.keterangan
				FROM tbl_cuti JOIN tbl_karyawan ON tbl_cuti.idKaryawan = tbl_karyawan.idKaryawan
				JOIN tbl_pekerjaan ON tbl_karyawan.idKaryawan = tbl_pekerjaan.idKaryawan
				JOIN tbl_organisasi ON tbl_organisasi.idOrg = tbl_pekerjaan.idOrg
				JOIN tbl_jabatan ON tbl_jabatan.idJabatan = tbl_pekerjaan.idJabatan
				JOIN tbl_departemen ON tbl_departemen.idDept = tbl_pekerjaan.idDept
				WHERE tbl_karyawan.namaLengkap like '%$cari%'
				ORDER by tbl_cuti.idCuti asc");
			$this->load->view('tampil_setuju_cuti',array('data' => $data));
	}
}
