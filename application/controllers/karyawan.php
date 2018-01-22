<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Karyawan extends CI_Controller {

	/* DATA PEKERJAAN */
	public function tambah($page,$idKaryawan)
	{
		$data_organisasi = $this->model->GetData("tbl_organisasi ORDER BY idOrg ASC");
		$data_jabatan = $this->model->GetData("tbl_jabatan ORDER BY idJabatan ASC");
		$data_departemen = $this->model->GetData("tbl_departemen ORDER BY idDept ASC");
		$this->load->view('nav',array('data_organisasi' => $data_organisasi,'data_jabatan' => $data_jabatan,'data_departemen' => $data_departemen));
		$this->load->view('form',array('page' => $page,'idKaryawan'=>$idKaryawan));	
	}
	public function orang_tua($idKaryawan)
	{
		$namaAyah 			= $_POST['namaAyah'];
		$namaIbu 			= $_POST['namaIbu'];
		$alamatOrtu 		= $_POST['alamatOrtu'];
		$kotaOrtu 			= $_POST['kotaOrtu'];
		$provOrtu 			= $_POST['provOrtu'];
		$kodeposOrtu 		= $_POST['kodeposOrtu'];
		$telpOrtu 			= $_POST['telpOrtu'];
		
		$namaAyahMertua 	= $_POST['namaAyahMertua'];
		$namaIbuMertua 		= $_POST['namaIbuMertua'];
		$alamatMertua 		= $_POST['alamatMertua'];
		$kotaMertua 		= $_POST['kotaMertua'];	
		$provinsiMertua 	= $_POST['provinsiMertua'];
		$kodeposMertua 		= $_POST['kodeposMertua'];
		$telpMertua 		= $_POST['telpMertua'];

		$data_karyawan = array(
					'namaAyah'		=> $namaAyah,
					'namaIbu'		=> $namaIbu,
					'alamatOrtu'	=> $alamatOrtu,
					'kotaOrtu'		=> $kotaOrtu,
					'provOrtu'		=> $provOrtu,
					'kodeposOrtu'	=> $kodeposOrtu,
					'telpOrtu'		=> $telpOrtu,
					'namaAyahMertua'=> $namaAyahMertua,
					'namaIbuMertua'	=> $namaIbuMertua,
					'alamatMertua'	=> $alamatMertua,
					'kotaMertua'	=> $kotaMertua,
					'provinsiMertua' => $provinsiMertua,
					'kodeposMertua'	=> $kodeposMertua,
					'telpMertua'	=> $telpMertua,
				);

		$where = array('idKaryawan' => $idKaryawan);
		$this->db->update('tbl_karyawan',$data_karyawan,$where);

		redirect("karyawan/tambah_info/orang_tua/$idKaryawan");
	}
	public function cek_status_email(){
        $eMail = $_POST['eMail'];
         
        $hasil_eMail = $this->model->cek_email($eMail);
         
        if(count($hasil_eMail)!=0){
            echo "1";
        }else{
            echo "0";
        }
         
    }
  	public function departemen(){
      $idOrg = $this->input->post('idOrg');
      $dep = $this->model->getDepartemen($idOrg);
      $data .= "<option value=''> Pilih Departemen</option>";
      foreach ($dep as $jb) {
          $data .= "<option value='$jb[idDept]'> $jb[namaDept]</option>\n";
      }
      echo $data;
  	}
	public function jabatan(){
      $idDept = $this->input->post('idDept');
      $jabat = $this->model->getJabatan($idDept);
      $data .= "<option value=''> Pilih Jabatan </option>";
      foreach ($jabat as $jb) {
          $data .= "<option value='$jb[idJabatan]'> $jb[namaJabatan]</option>\n";
      }
      echo $data;
  	}
	public function tambah_info($page,$idKaryawan)
	{
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
		$data_departemen = $this->model->GetData("tbl_departemen ORDER BY idDept ASC");
		$s = $this->model->GetData("tbl_karyawan where idKaryawan = $idKaryawan");
		$data_pekerjaan = $this->model->GetData("tbl_pekerjaan where idKaryawan = $idKaryawan");
		$data_login = $this->model->GetData("login where idKaryawan = $idKaryawan");
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
				'contohBlob'		=> $s[0]['contohBlob'],
				'data_pekerjaan' 	=> $data_pekerjaan,
				'data_login' 	=> $data_login,
				'page' => $page,
				$page => $c,
			);
		$this->load->view('nav',array('data_organisasi' => $data_organisasi,'data_jabatan' => $data_jabatan,'data_departemen' => $data_departemen));
		$this->load->view('form',$data);	
	}

	public function tambahkan(){
		$namaLengkap 	= $_POST['namaLengkap'];
		$namaPanggil 	= $_POST['namaPanggil'];
		$tmpLahir 		= $_POST['tmpLahir'];
		$tglLahir 		= $_POST['tglLahir'];
		$alamat 		= $_POST['alamat'];
		$kota 			= $_POST['kota'];
		$propinsi 		= $_POST['propinsi'];
		$eMail 			= $_POST['eMail'];
		$telpRumah 		= $_POST['telpRumah'];
		$handphone 		= $_POST['handphone'];
		$tipeIdentitas 	= $_POST['tipeIdentitas'];
		$noIdentitas 	= $_POST['noIdentitas'];
		$golDarah 		= $_POST['golDarah'];
		$agama 			= $_POST['agama'];
		$kodepos 		= $_POST['kodepos'];
		$statusMenikah 	= $_POST['statusMenikah'];
		$jenisKelamin 	= $_POST['jenisKelamin'];
		$statusKerja 	= $_POST['statusKerja'];
		$namaPasangan 	= $_POST['namaPasangan'];
		$namaAyah 			= $_POST['namaAyah'];
		$namaIbu 			= $_POST['namaIbu'];
		$alamatOrtu 		= $_POST['alamatOrtu'];
		$kotaOrtu 			= $_POST['kotaOrtu'];
		$provOrtu 			= $_POST['provOrtu'];
		$kodeposOrtu 		= $_POST['kodeposOrtu'];
		$telpOrtu 			= $_POST['telpOrtu'];
		
		$namaAyahMertua 	= $_POST['namaAyahMertua'];
		$namaIbuMertua 		= $_POST['namaIbuMertua'];
		$alamatMertua 		= $_POST['alamatMertua'];
		$kotaMertua 		= $_POST['kotaMertua'];	
		$provinsiMertua 	= $_POST['provinsiMertua'];
		$kodeposMertua 		= $_POST['kodeposMertua'];
		$telpMertua 		= $_POST['telpMertua'];
		$rubah 			= date_format(date_create($tglLahir), 'Y');
		$thn_skrg 		= date('Y');
		$usia 			= $thn_skrg - $rubah;
		$image 			= file_get_contents($_FILES['file']['tmp_name']);
		$idOrg			= $_POST['idOrg'];
		$idDept			= $_POST['idDept'];
		$idJabatan		= $_POST['idJabatan'];
		$tglMasuk		= $_POST['tglMasuk'];
		$deskripsi		= "suaramerdeka";
		$level			= $_POST['level'];
		$file 			= $_FILES['file']['name'];

			if($deskripsi!=""){
				include 'aes/AES.php';
				$blockSize = 256;
				$aes = new AES($blockSize,$deskripsi);
				$password = $aes->encrypt();
			}

		$row 	= $this->db->query('SELECT * FROM login where eMail = "'.$eMail.'"');
		$row_mail = $row->num_rows();
		if($row_mail>0){
			$data = array(	'info'	=> 'email sudah digunakan');
			$this->load->view('nav',$data);
		}
		else{
			$this->load->library('email');
			$config = array();
			$config['useragent'] = 'Codeigniter';
			$config['protocol']    = 'smtp';
			$config['smtp_host']    = 'ssl://smtp.gmail.com';
			$config['smtp_port']    = '465';
			$config['smtp_timeout'] = '400';
			$config['smtp_user']    = 'kkicempaka@gmail.com';
			$config['smtp_pass']    = 'udinuspolke1';
			$config['charset']    = 'utf-8';
			$config['newline']    = "\r\n";
			$config['mailtype'] = 'html'; // or html
			$config['crlf'] = "\r\n";
			$config['validation'] = TRUE;
			

			$enc_nm=md5(sha1($namaLengkap));
			$this->email->initialize($config);
			$this->email->set_mailtype("html");
			$this->email->from($config['smtp_user'],'Suara Merdeka');
			$this->email->to($eMail);
			$this->email->cc('');
			$this->email->bcc('');

			$this->email->subject('Pegawai Baru Suara Merdeka');
			$this->email->message("Anda Telah terdaftar $level di Sistem Pegawai Suara Merdeka, silahkan klik link ini untuk mengakfikan akun :".anchor("login/verification/$enc_nm",'aktifasi akun pegawai suara merdeka') );
			error_reporting(E_ALL);

				if($this->email->send()){
					$data_karyawan = array(
						'idKaryawan' 	=> "",
						'namaLengkap' 	=> $namaLengkap,
						'namaPanggil' 	=> $namaPanggil,
						'tmpLahir' 		=> $tmpLahir,
						'tglLahir' 		=> $tglLahir,
						'usia' 			=> $usia,
						'alamat' 		=> $alamat,
						'kota' 			=> $kota,
						'propinsi' 		=> $propinsi,
						'eMail' 		=> $eMail,
						'telpRumah' 	=> $telpRumah,
						'handphone' 	=> $handphone,
						'tipeIdentitas' => $tipeIdentitas,
						'noIdentitas' 	=> $noIdentitas,
						'golDarah' 		=> $golDarah,
						'agama' 		=> $agama,
						'kodepos' 		=> $kodepos,
						'statusMenikah' => $statusMenikah,
						'jenisKelamin' 	=> $jenisKelamin,
						'statusKerja' 	=> $statusKerja,
						'namaFoto' 		=> $file,
						'namaPasangan'	=> $namaPasangan,
						'namaAyah'		=> $namaAyah,
						'namaIbu'		=> $namaIbu,
						'alamatOrtu'	=> $alamatOrtu,
						'kotaOrtu'		=> $kotaOrtu,
						'provOrtu'		=> $provOrtu,
						'kodeposOrtu'	=> $kodeposOrtu,
						'telpOrtu'		=> $telpOrtu,
						'namaAyahMertua'=> $namaAyahMertua,
						'namaIbuMertua'	=> $namaIbuMertua,
						'alamatMertua'	=> $alamatMertua,
						'kotaMertua'	=> $kotaMertua,
						'provinsiMertua' => $provinsiMertua,
						'kodeposMertua'	=> $kodeposMertua,
						'telpMertua'	=> $telpMertua,
						'contohBlob'	=>$image,
					);

			$add_karyawan = $this->db->insert('tbl_karyawan',$data_karyawan);
		
			if($add_karyawan >= 1){
				$s = $this->model->GetData("tbl_karyawan where namaLengkap = '$namaLengkap' and namaPanggil = '$namaPanggil' and tmpLahir = '$tmpLahir' and noIdentitas = '$noIdentitas'");
				$data_pekerjaan = array(
						'idPekerjaan' => "",
						'idKaryawan' => $s[0]['idKaryawan'] ,
						'idOrg' => $idOrg,
						'idDept' => $idDept,
						'idJabatan' => $idJabatan,
						'tglMasuk' => $tglMasuk
					);
				
				$data_login = array(
					'id_login'		=>	"",
					'idKaryawan'	=> $s[0]['idKaryawan'],
					'username' 		=> $namaLengkap,
					'password'		=> $password,
					'level' 		=> $level,
					'statusAkun' 	=> 0,
					'email'			=> $eMail
					);
				$this->db->insert('tbl_pekerjaan',$data_pekerjaan);
				$this->db->insert('login',$data_login);
			}
					?>
				<script type="text/javascript">
					alert("tersimpan");
				</script>
				<?php
				redirect("karyawan/tambah_info/anak/".$s[0]['idKaryawan']."?info=Tersimpan");
				}
				else{
					echo $this->email->print_debugger();
				}
		}
	}
	public function tampil($status){
		$data_organisasi = $this->model->GetData("tbl_organisasi ORDER BY idOrg ASC");
		$data_jabatan = $this->model->GetData("tbl_jabatan ORDER BY idJabatan ASC");
		$this->load->view('nav',array('data_organisasi' => $data_organisasi,'data_jabatan' => $data_jabatan));
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
        $pager = $pager+1;
		$data = $this->model->GetD("tbl_karyawan.idKaryawan, tbl_karyawan.namaLengkap, tbl_karyawan.jenisKelamin, tbl_pekerjaan.idPekerjaan, tbl_pekerjaan.idKaryawan, tbl_pekerjaan.idOrg, tbl_organisasi.namaOrg, tbl_jabatan.namaJabatan,tbl_departemen.namaDept, tbl_karyawan.tglLahir, tbl_karyawan.usia, tbl_karyawan.statusKerja, tbl_karyawan.namaFoto
			FROM tbl_karyawan JOIN tbl_pekerjaan ON tbl_karyawan.idKaryawan = tbl_pekerjaan.idKaryawan
			JOIN tbl_organisasi ON tbl_organisasi.idOrg = tbl_pekerjaan.idOrg
			JOIN tbl_jabatan ON tbl_jabatan.idJabatan = tbl_pekerjaan.idJabatan
			JOIN tbl_departemen ON tbl_departemen.idDept = tbl_pekerjaan.idDept
			where tbl_karyawan.statusKerja = '$status' $where ORDER by tbl_karyawan.idKaryawan asc LIMIT ".$page.",".$batasawal);
		$this->load->view('tampil_karyawan',array('data' => $data,'status' => $status,'prev' => $prev,'no' => $no, 'pager' => $pager, 'batasawal' => $batasawal, 'info_show' => $info_show, 'info_where' => $info_where, 'b' => $b,'a' => $a));
	}
	public function hapus($idKaryawan,$namaFoto){
			$where = array('idKaryawan' => $idKaryawan);
			$d = $this->db->Delete('login',$where);
			$data = $this->db->Delete('tbl_karyawan',$where);
			if($data >= 1){
				if($idKaryawan!==$this->session->userdata('id')){
				redirect("karyawan/tampil/aktif");
				}
				$this->simple_login->hapus();	
			}
	}
	public function editkan($idKaryawan,$namaFoto){
		$namaLengkap 	= $_POST['namaLengkap'];
		$namaPanggil 	= $_POST['namaPanggil'];
		$tmpLahir 		= $_POST['tmpLahir'];
		$tglLahir 		= $_POST['tglLahir'];
		$alamat 		= $_POST['alamat'];
		$kota 			= $_POST['kota'];
		$propinsi 		= $_POST['propinsi'];
		$telpRumah 		= $_POST['telpRumah'];
		$handphone 		= $_POST['handphone'];
		$tipeIdentitas 	= $_POST['tipeIdentitas'];
		$noIdentitas 	= $_POST['noIdentitas'];
		$golDarah 		= $_POST['golDarah'];
		$agama 			= $_POST['agama'];
		$kodepos 		= $_POST['kodepos'];
		$statusMenikah 	= $_POST['statusMenikah'];
		$jenisKelamin 	= $_POST['jenisKelamin'];
		$namaPasangan 	= $_POST['namaPasangan'];
		$rubah 			= date_format(date_create($tglLahir), 'Y');
		$thn_skrg 		= date('Y');
		$usia 			= $thn_skrg - $rubah;
		$image 			= file_get_contents($_FILES['file']['tmp_name']);
		$namaFoto 		= $_FILES['file']['name'];
		$idOrg 			= $_POST['idOrg'];
		$idDept			= $_POST['idDept'];
		$idJabatan 		= $_POST['idJabatan'];
		$tglMasuk 		= $_POST['tglMasuk'];
		$alasanMasuk 	= $_POST['alasanMasuk'];
		$tglKeluar 		= $_POST['tglKeluar'];
		$alasanKeluar	= $_POST['alasanKeluar'];
		$catatan 		= $_POST['catatan'];


		$data_karyawan = array(
					'namaLengkap' => $namaLengkap,
					'namaPanggil' => $namaPanggil,
					'tmpLahir' => $tmpLahir,
					'tglLahir' => $tglLahir,
					'alamat' => $alamat,
					'kota' => $kota,
					'propinsi' => $propinsi,
					'eMail' => $eMail,
					'telpRumah' => $telpRumah,
					'handphone' => $handphone,
					'tipeIdentitas' => $tipeIdentitas,
					'noIdentitas' => $noIdentitas,
					'golDarah' => $golDarah,
					'agama' => $agama,
					'kodepos' => $kodepos,
					'statusMenikah' => $statusMenikah,
					'jenisKelamin' => $jenisKelamin,
					'namaFoto'	=> $namaFoto,
					'namaPasangan'		=> $namaPasangan,
					'usia' 			=> $usia,
				);
		$data_pekerjaan = array(
				'idOrg' 		=> $idOrg,
				'idJabatan' 	=> $idJabatan,
				'tglMasuk' 		=> $tglMasuk,
				'alasanMasuk' 	=> $alasanMasuk,
				'tglKeluar'		=> $tglKeluar,
				'alasanKeluar' 	=> $alasanKeluar,
				'catatan'	 	=> $catatan
			);
		$data_login = array(
				'username' 		=> $namaLengkap,
				);
		
		$where = array('idKaryawan' => $idKaryawan);

		if($namaFoto!==""){
			$data_gambar=array(
				'contohBlob' =>$image,
				);
			$this->db->update('tbl_karyawan',$data_gambar,$where);
		}
		$res = $this->db->update('tbl_karyawan',$data_karyawan,$where);
		$this->db->update('tbl_pekerjaan',$data_pekerjaan,$where);
		$this->db->update('login',$data_login,$where);
		
		if($res >= 1){
			if($idKaryawan!==$this->session->userdata('id')){
			redirect("karyawan/tampil/aktif");
			}
			$this->simple_login->kembali();	
		}	
	}
	public function tampil_data($idKaryawan,$status){
		$d = $this->model->GetD("tbl_karyawan.idKaryawan, tbl_karyawan.namaLengkap, tbl_karyawan.namaPanggil, tbl_karyawan.tmpLahir, tbl_karyawan.tglLahir, 
			tbl_karyawan.alamat, tbl_karyawan.kota, tbl_karyawan.propinsi, tbl_karyawan.eMail, tbl_karyawan.telpRumah, 
			tbl_karyawan.handphone, tbl_karyawan.tipeIdentitas, tbl_karyawan.noIdentitas, tbl_karyawan.golDarah, tbl_karyawan.agama, 
			tbl_karyawan.kodepos, tbl_karyawan.statusMenikah, tbl_karyawan.jenisKelamin, tbl_karyawan.statusKerja, tbl_karyawan.namaFoto,
			tbl_pekerjaan.idPekerjaan, tbl_organisasi.idOrg, tbl_jabatan.idJabatan, tbl_departemen.idDept,tbl_departemen.namaDept, 
			tbl_organisasi.namaOrg, tbl_jabatan.namaJabatan, tbl_pekerjaan.tglMasuk, tbl_pekerjaan.alasanMasuk, tbl_pekerjaan.tglKeluar,
			tbl_pekerjaan.alasanKeluar, tbl_pekerjaan.catatan  
			FROM tbl_karyawan JOIN tbl_pekerjaan ON tbl_karyawan.idKaryawan = tbl_pekerjaan.idKaryawan
			JOIN tbl_organisasi ON tbl_organisasi.idOrg = tbl_pekerjaan.idOrg
			JOIN tbl_jabatan ON tbl_jabatan.idJabatan = tbl_pekerjaan.idJabatan
			JOIN tbl_departemen ON tbl_departemen.idDept = tbl_pekerjaan.idDept
			where tbl_karyawan.idKaryawan = $idKaryawan");

		$data = array(
				'namaLengkap' 		=> $d[0]['namaLengkap'] ,
				'namaPanggil' 		=> $d[0]['namaPanggil'] ,
				'tmpLahir' 			=> $d[0]['tmpLahir'] ,
				'tglLahir' 			=> $d[0]['tglLahir'] ,
				'alamat' 			=> $d[0]['alamat'] ,
				'kota' 				=> $d[0]['kota'] ,
				'propinsi' 			=> $d[0]['propinsi'] ,
				'eMail' 			=> $d[0]['eMail'] ,
				'telpRumah' 		=> $d[0]['telpRumah'] ,
				'handphone' 		=> $d[0]['handphone'] ,
				'tipeIdentitas' 	=> $d[0]['tipeIdentitas'] ,
				'noIdentitas' 		=> $d[0]['noIdentitas'] ,
				'golDarah' 			=> $d[0]['golDarah'] ,
				'agama' 			=> $d[0]['agama'] ,
				'kodepos' 			=> $d[0]['kodepos'] ,
				'statusMenikah' 	=> $d[0]['statusMenikah'] ,
				'jenisKelamin' 		=> $d[0]['jenisKelamin'] ,
				'statusKerja' 		=> $d[0]['statusKerja'],
				'namaFoto' 			=> $d[0]['namaFoto'],
				'namaOrg'			=> $d[0]['namaOrg'] ,
				'namaDept' 			=> $d[0]['namaDept'] ,
				'namaJabatan' 		=> $d[0]['namaJabatan'] ,
				'tglMasuk' 			=> $d[0]['tglMasuk'] ,
				'alasanMasuk' 		=> $d[0]['alasanMasuk'] ,
				'tglKeluar' 		=> $d[0]['tglKeluar'] ,
				'alasanKeluar' 		=> $d[0]['alasanKeluar'] ,
				'catatan'	 		=> $d[0]['catatan'] ,
				'status'			=> $status ,
			);
		$this->load->view('tampil_data_karyawan',$data);
	}
	public function statuskerja($status){
		$jumlah_baris = $this->db->count_all_results('tbl_karyawan');
		for($i=1; $i<=$jumlah_baris; $i++){
			if(isset($_POST['cek_'.$i])) {
				$data = array(
					'statusKerja' => $status,
				);
				$where = array('idKaryawan' => $_POST['cek_'.$i]);
				$this->db->update('tbl_karyawan',$data,$where);
				if($status!=="aktif"){
					$d = array(
						'statusAkun' => 2,
					);
				}else{
					$d = array(
						'statusAkun' => 0,
					);
				}
				$this->db->update('login',$d,$where);
			}
		}
		redirect("karyawan/tampil/keluar");	
	}
	function PDF($idKaryawan,$status){
		if($this->session->userdata('level')=="user"){
			$idKar=$this->session->userdata('id');
		}
		else if($this->session->userdata('level')==""){
			redirect("login");
		}
		else{
			$idKar=$idKaryawan;
		}
		include "fpdf/fpdf.php";
		$d = $this->model->GetD("tbl_karyawan.idKaryawan, tbl_karyawan.namaLengkap, tbl_karyawan.namaPanggil, tbl_karyawan.tmpLahir, tbl_karyawan.tglLahir, 
			tbl_karyawan.alamat, tbl_karyawan.kota, tbl_karyawan.propinsi, tbl_karyawan.eMail, tbl_karyawan.telpRumah, 
			tbl_karyawan.handphone, tbl_karyawan.tipeIdentitas, tbl_karyawan.noIdentitas, tbl_karyawan.golDarah, tbl_karyawan.agama, 
			tbl_karyawan.kodepos, tbl_karyawan.statusMenikah, tbl_karyawan.jenisKelamin, tbl_karyawan.statusKerja, tbl_karyawan.namaFoto,tbl_karyawan.contohBlob,
			tbl_pekerjaan.idPekerjaan, tbl_organisasi.idOrg, tbl_jabatan.idJabatan,tbl_departemen.idDept,tbl_departemen.namaDept, 
			tbl_organisasi.namaOrg, tbl_jabatan.namaJabatan, tbl_pekerjaan.tglMasuk, tbl_pekerjaan.alasanMasuk, tbl_pekerjaan.tglKeluar,
			tbl_pekerjaan.alasanKeluar, tbl_pekerjaan.catatan  
			FROM tbl_karyawan JOIN tbl_pekerjaan ON tbl_karyawan.idKaryawan = tbl_pekerjaan.idKaryawan
			JOIN tbl_organisasi ON tbl_organisasi.idOrg = tbl_pekerjaan.idOrg
			JOIN tbl_jabatan ON tbl_jabatan.idJabatan = tbl_pekerjaan.idJabatan
			JOIN tbl_departemen ON tbl_departemen.idDept = tbl_pekerjaan.idDept
			where tbl_karyawan.idKaryawan = $idKar");
		
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
		$pdf->Image(base_url()."karyawan/tampil_gambar/$idKar".$xt,142,23,50,50);
		$pdf->Ln(5);
		$pdf->Cell(50,0,'Departemen',0,0,'L');
		$pdf->Cell(5,0,':',0,0,'C');
		$pdf->Cell(150,0,$d[0]['namaDept'],0,0,'L');
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
	public function cari($status){
		$cari= $this->input->get('input_cari');
		$data_organisasi = $this->model->GetData("tbl_organisasi ORDER BY idOrg ASC");
		$data_jabatan = $this->model->GetData("tbl_jabatan ORDER BY idJabatan ASC");
		$this->load->view('nav',array('data_organisasi' => $data_organisasi,'data_jabatan' => $data_jabatan));
		$data = $this->model->GetD("tbl_karyawan.idKaryawan, tbl_karyawan.namaLengkap, tbl_karyawan.jenisKelamin, tbl_pekerjaan.idPekerjaan, tbl_pekerjaan.idKaryawan, tbl_pekerjaan.idOrg, tbl_organisasi.namaOrg, tbl_departemen.idDept,tbl_departemen.namaDept, tbl_jabatan.namaJabatan, tbl_karyawan.tglLahir, tbl_karyawan.usia, tbl_karyawan.statusKerja, tbl_karyawan.namaFoto
			FROM tbl_karyawan JOIN tbl_pekerjaan ON tbl_karyawan.idKaryawan = tbl_pekerjaan.idKaryawan
			JOIN tbl_organisasi ON tbl_organisasi.idOrg = tbl_pekerjaan.idOrg
			JOIN tbl_jabatan ON tbl_jabatan.idJabatan = tbl_pekerjaan.idJabatan
			JOIN tbl_departemen ON tbl_departemen.idDept = tbl_pekerjaan.idDept
			where tbl_karyawan.statusKerja = '$status' and tbl_karyawan.namaLengkap like '%$cari%' ORDER by tbl_karyawan.idKaryawan asc");
		$this->load->view('tampil_karyawan',array('data' => $data,'status' => $status));
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
	function tampil_gambar($id){
	  $this->load->model('model');
	  $this->model->tampil_upload($id);
	 }

	// public function email(){
	// 	$level ="admin";
	// 	$this->load->library('email');

	// 	$config['protocol']    = 'smtp';
	// 	$config['smtp_host']    = 'ssl://smtp.gmail.com';
	// 	$config['smtp_port']    = '465';
	// 	$config['smtp_timeout'] = '7';
	// 	$config['smtp_user']    = 'kkicempaka@gmail.com';
	// 	$config['smtp_pass']    = 'udinuspolke1';
	// 	$config['charset']    = 'utf-8';
	// 	$config['newline']    = "\r\n";
	// 	$config['mailtype'] = 'html'; // or html
	// 	$config['validation'] = TRUE;

	// 	$this->email->initialize($config);

	// 	$this->email->from('kkicempaka@gmail.com', 'Arief');
	// 	$this->email->to('arief.manda57@gmail.com');
	// 	$this->email->cc('');
	// 	$this->email->bcc('');

	// 	$this->email->subject('Email Test');
	// 	$this->email->message("Anda Telah terdaftar $level di pegawai suara merdeka, silahkan klik link ini untuk mengakfikan akun= ". anchor('login/verification','aaa') );
	// 	error_reporting(E_ALL);

	// 	if($this->email->send()){
	// 		echo "sukses";
	// 	}
	// 	else{
	// 		echo $this->email->print_debugger();
	// 		echo "email anda salah";}

// 		$to = 'arief.manda57@gmail.com';
// 		$from = 'kkicempaka@gmail.com';
// 		$subject = 'Email Test';
// 		$body = 'Testing the email class.';
// 		$headers =
//     "Content-Type: text/plain; charset=UTF-8" . "\r\n" .
//     "MIME-Version: 1.0" . "\r\n" .
//     "From: $from" . "\r\n" .
//     "X-Mailer: PHP/" . phpversion();
// if (email ($to, $subject, $body , $headers)===TRUE) {
//     echo "mail was sent ok";
// } else {
//     echo "mail failed";
// }


	//}

	/* end DATA KARYAWAN */
}