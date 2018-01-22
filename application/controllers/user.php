<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {
	public function index()
	{
		$data_organisasi = $this->model->GetData("tbl_organisasi");
		$data_jabatan = $this->model->GetData("tbl_jabatan");
		$this->load->view('user/navi',array('data_organisasi' => $data_organisasi,'data_jabatan' => $data_jabatan));	
	}

	/* DATA PEKERJAAN */
	public function jabatan(){
      $idOrg = $this->input->post('idOrg');
      $jabat = $this->model->getJabatan($idOrg);
      $data .= "<option value=''> Pilih Jabatan </option>";
      foreach ($jabat as $jb) {
          $data .= "<option value='$jb[idJabatan]'> $jb[namaJabatan]</option>\n";
      }
      echo $data;
  	}

	public function tambah_info($page,$idKaryawan)
	{
		if($idKaryawan!==$this->session->userdata('id'))
		{
			redirect("user/tampil");
		} else {
		if($page == 'anak'){
			$c = $this->model->GetData("tbl_anak where idKaryawan = '$idKaryawan'");
		} else if($page == 'pendidikan'){
			$c = $this->model->GetData("tbl_karypendidikan where idKaryawan = '$idKaryawan'");
		} else if($page == 'kursus'){
			$c = $this->model->GetData("tbl_karypendidikannf where idKaryawan = '$idKaryawan'");
		} else if($page == 'sertifikat'){
			$c = $this->model->GetData("tbl_karytrainseminar where idKaryawan = '$idKaryawan'");
		} else if($page == 'referensi'){
			$c = $this->model->GetData("tbl_karyrefkeluarga where idKaryawan = '$idKaryawan'");
		} else if($page == 'pengalaman_kerja'){
			$c = $this->model->GetData("tbl_karypengkerja where idKaryawan = '$idKaryawan'");
		} else if($page == 'pengalaman_tugas'){
			$c = $this->model->GetData("tbl_karypengtugas where idKaryawan = '$idKaryawan'");
		} else if($page == 'penghargaan'){
			$c = $this->model->GetData("tbl_karypenghargaan where idKaryawan = '$idKaryawan'");
		} else if($page == 'pengalaman_organisasi'){
			$c = $this->model->GetData("tbl_karypengorg where idKaryawan = '$idKaryawan'");
		} else {
			$c=0;
		}
		$data_organisasi = $this->model->GetData("tbl_organisasi ORDER BY idOrg ASC");
		$data_jabatan = $this->model->GetData("tbl_jabatan ORDER BY idJabatan ASC");
		$s = $this->model->GetData("tbl_karyawan where idKaryawan = $idKaryawan");
		$data_pekerjaan = $this->model->GetData("tbl_pekerjaan where idKaryawan = $idKaryawan");
		$data = array(
				'idKaryawan' 		=> $idKaryawan ,
				'namaLengkap' 		=> $s[0]['namaLengkap'],
				'statusKerja' 		=> $s[0]['statusKerja'],
				'namaPanggil'		=> $s[0]['namaPanggil'] ,
				'tmpLahir' 			=> $s[0]['tmpLahir'] ,
				'tglLahir' 			=> $s[0]['tglLahir'] ,
				'alamat' 			=> $s[0]['alamat'] ,
				'kota' 				=> $s[0]['kota'] ,
				'propinsi' 			=> $s[0]['propinsi'] ,
				'eMail' 			=> $s[0]['eMail'] ,
				'telpRumah' 		=> $s[0]['telpRumah'] ,
				'handphone' 		=> $s[0]['handphone'] ,
				'tipeIdentitas' 	=> $s[0]['tipeIdentitas'] ,
				'noIdentitas' 		=> $s[0]['noIdentitas'] ,
				'golDarah' 			=> $s[0]['golDarah'] ,
				'agama' 			=> $s[0]['agama'] ,
				'kodepos' 			=> $s[0]['kodepos'] ,
				'statusMenikah' 	=> $s[0]['statusMenikah'] ,
				'jenisKelamin' 		=> $s[0]['jenisKelamin'] ,
				'statusKerja' 		=> $s[0]['statusKerja'],
				'namaFoto' 			=> $s[0]['namaFoto'],
				'namaPasangan'		=> $s[0]['namaPasangan'],
				'namaAyah'			=> $s[0]['namaAyah'],
				'namaIbu'			=> $s[0]['namaIbu'],
				'namaAyahMertua'	=> $s[0]['namaAyahMertua'],
				'namaIbuMertua'		=> $s[0]['namaIbuMertua'],
				'alamatOrtu'		=> $s[0]['alamatOrtu'],
				'kotaOrtu'			=> $s[0]['kotaOrtu'],
				'provOrtu'			=> $s[0]['provOrtu'],
				'kodeposOrtu'		=> $s[0]['kodeposOrtu'],
				'telpOrtu'			=> $s[0]['telpOrtu'],
				'alamatMertua'		=> $s[0]['alamatMertua'],
				'kotaMertua'		=> $s[0]['kotaMertua'],
				'provinsiMertua'	=> $s[0]['provinsiMertua'],
				'kodeposMertua'		=> $s[0]['kodeposMertua'],
				'telpOrtu'			=> $s[0]['telpOrtu'],
				'telpMertua'		=> $s[0]['telpMertua'],
				'data_pekerjaan' 	=> $data_pekerjaan,
				'page' => $page,
				$page => $c,
			);
		$this->load->view('user/navi',array('data_organisasi' => $data_organisasi,'data_jabatan' => $data_jabatan));
		$this->load->view('user/form',$data);	
	}
	}

	public function tampil(){
		$data_organisasi = $this->model->GetData("tbl_organisasi ORDER BY idOrg ASC");
		$data_jabatan = $this->model->GetData("tbl_jabatan ORDER BY idJabatan ASC");
		$this->load->view('user/navi',array('data_organisasi' => $data_organisasi,'data_jabatan' => $data_jabatan));

		$data = $this->model->GetD("tbl_karyawan.idKaryawan, tbl_karyawan.namaLengkap, tbl_karyawan.jenisKelamin, tbl_pekerjaan.idPekerjaan, tbl_pekerjaan.idKaryawan, tbl_pekerjaan.idOrg, tbl_organisasi.namaOrg, tbl_jabatan.namaJabatan, tbl_karyawan.tglLahir, tbl_karyawan.usia, tbl_karyawan.statusKerja,tbl_departemen.namaDept, tbl_karyawan.namaFoto
			FROM tbl_karyawan JOIN tbl_pekerjaan ON tbl_karyawan.idKaryawan = tbl_pekerjaan.idKaryawan
			JOIN tbl_organisasi ON tbl_organisasi.idOrg = tbl_pekerjaan.idOrg
			JOIN tbl_jabatan ON tbl_jabatan.idJabatan = tbl_pekerjaan.idJabatan
			JOIN tbl_departemen ON tbl_departemen.idDept = tbl_pekerjaan.idDept
			where tbl_karyawan.statusKerja = 'aktif' ORDER by tbl_karyawan.idKaryawan asc ");
		$this->load->view('user/tampil_karyawan',array('data' => $data));
	}

	function PDFcuti($idCuti,$idKaryawan,$proses){
		if($idKaryawan!==$this->session->userdata('id'))
		{
			redirect("user/tampilCuti/".$idKaryawan);
		} else {
			if($proses=="Menunggu"){
				redirect("user/tampilCuti/".$idKaryawan);
			}
			else{
		include "fpdf/fpdf.php";
		$d = $this->model->GetD("tbl_karyawan.idKaryawan, tbl_karyawan.namaLengkap, tbl_karyawan.jenisKelamin, tbl_karyawan.contohBlob,tbl_pekerjaan.idPekerjaan, tbl_pekerjaan.idKaryawan, tbl_pekerjaan.idOrg, tbl_organisasi.namaOrg, tbl_jabatan.namaJabatan, tbl_cuti.idCuti, tbl_cuti.proses, tbl_cuti.mulaiCuti, tbl_cuti.jumlahHari, tbl_cuti.keterangan
			FROM tbl_cuti JOIN tbl_karyawan ON tbl_cuti.idKaryawan = tbl_karyawan.idKaryawan
			JOIN tbl_pekerjaan ON tbl_karyawan.idKaryawan = tbl_pekerjaan.idKaryawan
			JOIN tbl_organisasi ON tbl_organisasi.idOrg = tbl_pekerjaan.idOrg
			JOIN tbl_jabatan ON tbl_jabatan.idJabatan = tbl_pekerjaan.idJabatan
			JOIN tbl_departemen ON tbl_departemen.idDept = tbl_pekerjaan.idDept
			where (tbl_cuti.idCuti='$idCuti')and(tbl_cuti.proses='$proses') ORDER by tbl_cuti.idCuti asc");

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
		$pdf->Ln(10);
		$pdf->Cell(300,0,'Diketahui',0,0,'C');
		$pdf->Ln(40);
		$pdf->Cell(305,0,'(____________________)',0,0,'C');
		$pdf->output();
			}
		}
	}
	
	function PDF($idKaryawan,$status){
		if($idKaryawan!==$this->session->userdata('id'))
		{
			redirect("user/tampil");
		} else {
		include "fpdf/fpdf.php";
		$d = $this->model->GetD("tbl_karyawan.idKaryawan, tbl_karyawan.namaLengkap, tbl_karyawan.namaPanggil, tbl_karyawan.contohBlob, tbl_karyawan.tmpLahir, tbl_karyawan.tglLahir, 
			tbl_karyawan.alamat, tbl_karyawan.kota, tbl_karyawan.propinsi, tbl_karyawan.eMail, tbl_karyawan.telpRumah, 
			tbl_karyawan.handphone, tbl_karyawan.tipeIdentitas, tbl_karyawan.noIdentitas, tbl_karyawan.golDarah, tbl_karyawan.agama, 
			tbl_karyawan.kodepos, tbl_karyawan.statusMenikah, tbl_karyawan.jenisKelamin, tbl_karyawan.statusKerja, tbl_karyawan.namaFoto,tbl_departemen.idDept,tbl_departemen.namaDept,
			tbl_pekerjaan.idPekerjaan, tbl_organisasi.idOrg, tbl_jabatan.idJabatan, 
			tbl_organisasi.namaOrg, tbl_jabatan.namaJabatan, tbl_pekerjaan.tglMasuk, tbl_pekerjaan.alasanMasuk, tbl_pekerjaan.tglKeluar,
			tbl_pekerjaan.alasanKeluar, tbl_pekerjaan.catatan  
			FROM tbl_karyawan JOIN tbl_pekerjaan ON tbl_karyawan.idKaryawan = tbl_pekerjaan.idKaryawan
			JOIN tbl_organisasi ON tbl_organisasi.idOrg = tbl_pekerjaan.idOrg
			JOIN tbl_jabatan ON tbl_jabatan.idJabatan = tbl_pekerjaan.idJabatan
			JOIN tbl_departemen ON tbl_departemen.idDept = tbl_pekerjaan.idDept
			where tbl_karyawan.idKaryawan = $idKaryawan");

		$pdf = new FPDF();
		$pdf->AddPage();

		$pdf->SetFont('Arial','B',16);
		$pdf->cell(0,5,'DATA KARYAWAN','0','1','C',false);
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
		$pdf->Cell(50,0,'Nama Panggil',0,0,'L');
		$pdf->Cell(5,0,':',0,0,'C');
		$pdf->Cell(150,0,$d[0]['namaPanggil'],0,0,'L');
		$pdf->Ln(5);
		$pdf->Cell(50,0,'Tempat dan Tanggal Lahir',0,0,'L');
		$pdf->Cell(5,0,':',0,0,'C');
		$pdf->Cell(150,0,$d[0]['tmpLahir'].','.$d[0]['tglLahir'].'(YYYY/MM/DD)',0,0,'L');
		$pdf->Ln(5);
		$pdf->Cell(50,0,'Alamat',0,0,'L');
		$pdf->Cell(5,0,':',0,0,'C');
		$pdf->MultiCell(70,4,$d[0]['alamat']);
		$pdf->Ln(5);
		$pdf->Cell(50,0,'Kota',0,0,'L');
		$pdf->Cell(5,0,':',0,0,'C');
		$pdf->Cell(50,0,$d[0]['kota'],0,0,'L');
		$pdf->Ln(5);
		$pdf->Cell(50,0,'Provinsi',0,0,'L');
		$pdf->Cell(5,0,':',0,0,'C');
		$pdf->Cell(150,0,$d[0]['propinsi'],0,0,'L');
		$pdf->Ln(5);
		$pdf->Cell(50,0,'EMail',0,0,'L');
		$pdf->Cell(5,0,':',0,0,'C');
		$pdf->Cell(150,0,$d[0]['eMail'],0,0,'L');
		$pdf->Ln(5);
		$pdf->Cell(50,0,'Telephone Rumah',0,0,'L');
		$pdf->Cell(5,0,':',0,0,'C');
		$pdf->Cell(150,0,$d[0]['telpRumah'],0,0,'L');
		$pdf->Ln(5);
		$pdf->Cell(50,0,'Nomer Handphone',0,0,'L');
		$pdf->Cell(5,0,':',0,0,'C');
		$pdf->Cell(150,0,$d[0]['handphone'],0,0,'L');
		$pdf->Ln(5);
		$pdf->Cell(50,0,'Tipe Identitas',0,0,'L');
		$pdf->Cell(5,0,':',0,0,'C');
		$pdf->Cell(150,0,$d[0]['tipeIdentitas'],0,0,'L');
		$pdf->Ln(5);
		$pdf->Cell(50,0,'Nomer Identitas',0,0,'L');
		$pdf->Cell(5,0,':',0,0,'C');
		$pdf->Cell(150,0,$d[0]['noIdentitas'],0,0,'L');
		$pdf->Ln(5);
		$pdf->Cell(50,0,'Golongan Darah',0,0,'L');
		$pdf->Cell(5,0,':',0,0,'C');
		$pdf->Cell(150,0,$d[0]['golDarah'],0,0,'L');
		$pdf->Ln(5);
		$pdf->Cell(50,0,'Agama',0,0,'L');
		$pdf->Cell(5,0,':',0,0,'C');
		$pdf->Cell(150,0,$d[0]['agama'],0,0,'L');
		$pdf->Ln(5);
		$pdf->Cell(50,0,'Kode Pos',0,0,'L');
		$pdf->Cell(5,0,':',0,0,'C');
		$pdf->Cell(150,0,$d[0]['kodepos'],0,0,'L');
		$pdf->Ln(5);
		$pdf->Cell(50,0,'status Menikah',0,0,'L');
		$pdf->Cell(5,0,':',0,0,'C');
		$pdf->Cell(150,0,$d[0]['statusMenikah'],0,0,'L');
		$pdf->Ln(5);
		$pdf->Cell(50,0,'Jenis Kelamin',0,0,'L');
		$pdf->Cell(5,0,':',0,0,'C');
		$pdf->Cell(150,0,$d[0]['jenisKelamin'],0,0,'L');
		$pdf->Ln(5);
		$pdf->Cell(50,0,'Status Kerja',0,0,'L');
		$pdf->Cell(5,0,':',0,0,'C');
		$pdf->Cell(150,0,$d[0]['statusKerja'],0,0,'L');
		$pdf->Ln(5);
		if($status == 'aktif'){
			$pdf->Cell(50,0,'Tanggal Masuk',0,0,'L');
			$pdf->Cell(5,0,':',0,0,'C');
			$pdf->Cell(150,0,$d[0]['tglLahir'],0,0,'L');
			$pdf->Ln(5);
        } else {
        	$pdf->Cell(50,0,'Tanggal Keluar',0,0,'L');
			$pdf->Cell(5,0,':',0,0,'C');
			$pdf->Cell(150,0,$d[0]['tglKeluar'],0,0,'L');
			$pdf->Ln(5);
        }
        $pdf->Cell(50,0,'Catatan',0,0,'L');
		$pdf->Cell(5,0,':',0,0,'C');
		$pdf->Cell(150,0,$d[0]['catatan'],0,0,'L');
		$pdf->Ln(5);
		$pdf->output();
		}
	}
	public function cari($status){
		$cari= $this->input->get('input_cari');
		$data_organisasi = $this->model->GetData("tbl_organisasi ORDER BY idOrg ASC");
		$data_jabatan = $this->model->GetData("tbl_jabatan ORDER BY idJabatan ASC");
		$this->load->view('nav',array('data_organisasi' => $data_organisasi,'data_jabatan' => $data_jabatan));
		$data = $this->model->GetD("tbl_karyawan.idKaryawan, tbl_karyawan.namaLengkap, tbl_karyawan.jenisKelamin, tbl_pekerjaan.idPekerjaan, tbl_pekerjaan.idKaryawan, tbl_pekerjaan.idOrg, tbl_organisasi.namaOrg, tbl_jabatan.namaJabatan, tbl_karyawan.tglLahir, tbl_karyawan.usia, tbl_karyawan.statusKerja, tbl_karyawan.namaFoto
			FROM tbl_karyawan JOIN tbl_pekerjaan ON tbl_karyawan.idKaryawan = tbl_pekerjaan.idKaryawan
			JOIN tbl_organisasi ON tbl_organisasi.idOrg = tbl_pekerjaan.idOrg
			JOIN tbl_jabatan ON tbl_jabatan.idJabatan = tbl_pekerjaan.idJabatan
			where tbl_karyawan.statusKerja = '$status' and tbl_karyawan.namaLengkap like '%$cari%' ORDER by tbl_karyawan.idKaryawan asc");
		$this->load->view('user/tampil_karyawan',array('data' => $data,'status' => $status));
	}
	public function tampil_karyawan($pilih){
		$data_organisasi = $this->model->GetData("tbl_organisasi ORDER BY idOrg ASC");
		$data_jabatan = $this->model->GetData("tbl_jabatan ORDER BY idJabatan ASC");
		$this->load->view('nav',array('data_organisasi' => $data_organisasi,'data_jabatan' => $data_jabatan));

		$data = $this->model->GetD("tbl_karyawan.idKaryawan, tbl_karyawan.namaLengkap, tbl_karyawan.jenisKelamin, tbl_pekerjaan.idPekerjaan, tbl_pekerjaan.idKaryawan, tbl_pekerjaan.idOrg, tbl_organisasi.namaOrg, tbl_jabatan.namaJabatan, tbl_karyawan.tglLahir, tbl_karyawan.usia, tbl_karyawan.statusKerja, tbl_karyawan.namaFoto
			FROM tbl_karyawan JOIN tbl_pekerjaan ON tbl_karyawan.idKaryawan = tbl_pekerjaan.idKaryawan
			JOIN tbl_organisasi ON tbl_organisasi.idOrg = tbl_pekerjaan.idOrg
			JOIN tbl_jabatan ON tbl_jabatan.idJabatan = tbl_pekerjaan.idJabatan
			where tbl_karyawan.statusKerja = 'aktif' ORDER by tbl_karyawan.idKaryawan asc");
		$this->load->view('tampil_pilih_karyawan',array('data' => $data,'pilih' => $pilih));
	}
	
	/*cuti*/
	public function tampilCuti($id){
		if($id==$this->session->userdata('id')){
		$c = $this->model->GetData("tbl_cuti where idKaryawan = '$id'");
		$d = $this->model->GetData("tbl_karyawan where idKaryawan = '$id'");
		$data = array(
				'idKaryawan' 		=> $d[0]['idKaryawan'] ,
				'namaLengkap' 		=> $d[0]['namaLengkap'] ,
				'statusKerja' 		=> $d[0]['statusKerja'],
				'c' => $c,
			);
		$data_organisasi = $this->model->GetData("tbl_organisasi ORDER BY idOrg ASC");
		$data_jabatan = $this->model->GetData("tbl_jabatan ORDER BY idJabatan ASC");
		$this->load->view('user/navi',array('data_organisasi' => $data_organisasi,'data_jabatan' => $data_jabatan));
		$this->load->view('user/tampil_cuti',$data);
		}
		else{
			redirect("user");
		}
	}
	
	public function editCuti($idCuti){
		$d = $this->model->GetData("tbl_cuti where idCuti = '$idCuti'");
		$idKaryawan = $d[0]['idKaryawan'];
		$c = $this->model->GetData("tbl_karyawan where idKaryawan = '$idKaryawan'");
		$data = array(
			'idKaryawan'		=> $d[0]['idKaryawan'] ,
			'namaLengkap' 		=> $c[0]['namaLengkap'] ,
			'statusKerja' 		=> $c[0]['statusKerja'],
			'idCuti' 			=> $d[0]['idCuti'],
			'mulaiCuti' 		=> $d[0]['mulaiCuti'],
			'jumlahHari' 		=> $d[0]['jumlahHari'],
			'keterangan' 		=> $d[0]['keterangan'],
			'proses' 		=> $d[0]['proses'],
			);
		$data_organisasi = $this->model->GetData("tbl_organisasi ORDER BY idOrg ASC");
		$data_jabatan = $this->model->GetData("tbl_jabatan ORDER BY idJabatan ASC");
		$this->load->view('user/navi',array('data_organisasi' => $data_organisasi,'data_jabatan' => $data_jabatan));
		$this->load->view('user/edit_cuti',$data);
	}
	public function editkanCuti($idCuti){
		$idKaryawan 	= $_POST['idKaryawan'];
		$mulaiCuti 		= $_POST['mulaiCuti'];
		$jumlahHari 	= $_POST['jumlahHari'];
		$jumlahHariEdit 	= $_POST['jumlahHariEdit'];
		$keterangan 		= $_POST['keterangan'];
		$proses 		= $_POST['proses'];
		$d = $this->model->GetData("tbl_cuti where idKaryawan = '$idKaryawan'");
		$jumlahTotCuti = 0;
		foreach ($d as $i) {
			$jumlahTotCuti = $i['jumlahHari'] + $jumlahTotCuti;
		}
		$jumlahTotCuti = $jumlahTotCuti - $jumlahHariEdit;
		if(($jumlahTotCuti + $jumlahHari) > 12){
			$c = $this->model->GetData("tbl_cuti where idKaryawan = '$idKaryawan'");
			$data_organisasi = $this->model->GetData("tbl_organisasi ORDER BY idOrg ASC");
			$data_jabatan = $this->model->GetData("tbl_jabatan ORDER BY idJabatan ASC");
			$this->load->view('user/navi',array('data_organisasi' => $data_organisasi,'data_jabatan' => $data_jabatan));
			$this->load->view('user/tampil_cuti',array('c' => $c,'idKaryawan' => $idKaryawan,'info' => 'Melebihi Batas Hari Yang Di Tentukan '));
		} else {
			$data = array(
				'idKaryawan' => $idKaryawan,
				'mulaiCuti' => $mulaiCuti,
				'jumlahHari' => $jumlahHari,
				'keterangan' => $keterangan
			);

			$where = array('idCuti' => $idCuti);
			
			$res = $this->db->update('tbl_cuti',$data,$where);

			if($res >= 1){
				redirect("user/tampilCuti/$idKaryawan");
			}	
		}	
	}
	public function cariCuti(){
		$cari= $this->input->get('input_cari');
		$data_organisasi = $this->model->GetData("tbl_organisasi ORDER BY idOrg ASC");
		$data_jabatan = $this->model->GetData("tbl_jabatan ORDER BY idJabatan ASC");
		$this->load->view('nav',array('data_organisasi' => $data_organisasi,'data_jabatan' => $data_jabatan));
		$data = $this->model->GetD("tbl_karyawan.idKaryawan, tbl_karyawan.namaLengkap, tbl_karyawan.jenisKelamin, tbl_pekerjaan.idPekerjaan, tbl_pekerjaan.idKaryawan, tbl_pekerjaan.idOrg, tbl_organisasi.namaOrg, tbl_karyawan.tglLahir, tbl_karyawan.usia, tbl_karyawan.statusKerja, tbl_jabatan.namaJabatan, tbl_karyawan.namaFoto
			FROM tbl_karyawan JOIN tbl_pekerjaan ON tbl_karyawan.idKaryawan = tbl_pekerjaan.idKaryawan
			JOIN tbl_organisasi ON tbl_organisasi.idOrg = tbl_pekerjaan.idOrg
			JOIN tbl_jabatan ON tbl_jabatan.idJabatan = tbl_pekerjaan.idOrg
			where tbl_karyawan.statusKerja = 'aktif' and tbl_karyawan.namaLengkap like '%$cari%'
			ORDER by tbl_karyawan.idKaryawan asc");
		$this->load->view('navi/tampil_pilih_karyawan_cuti',array('data' => $data));
	}

	function tampil_gambar($id){
	  $this->load->model('model');
	  $this->model->tampil_upload($id);
	 }
	/* end DATA USER */
}