<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Login extends CI_Controller {
	public function __construct() {
        parent::__construct();
        
    }
    
	// Index login
	public function index() {
		// Fungsi Login
		include 'aes/AES.php';
		// Fungsi Login
		$valid = $this->form_validation;
		$email = $this->input->post('email');
		$blockSize = 256;
		$pass = $this->input->post('password');
		$aes = new AES($blockSize,$pass);
		$valid->set_rules('email','email','required');
		$valid->set_rules('password','password','required');
		if($valid->run()) {
			$password = $aes->encrypt();
			$d = $this->model->GetData("login where email = '$email'");
			$level = $d[0]['level'];
			$this->simple_login->akun($email,$password,$level, base_url('nav'), base_url('login'));
		}
		// End fungsi login
		$data = array(	'title'	=> 'Halaman Login Administrator');
		$this->load->view('login_view',$data);
	}
	
	// Logout di sini
	public function logout() {
		$this->simple_login->logout();	
	}	

	public function tampil()
	{
		$data_organisasi = $this->model->GetData("tbl_organisasi ORDER BY idOrg ASC");
		$data_jabatan = $this->model->GetData("tbl_jabatan ORDER BY idJabatan ASC");
		$this->load->view('nav',array('data_organisasi' => $data_organisasi,'data_jabatan' => $data_jabatan));

		$data = $this->model->GetD("login.id_login,login.idKaryawan, login.statusAkun, login.username,login.email, login.level, tbl_pekerjaan.idKaryawan, tbl_organisasi.namaOrg, tbl_jabatan.namaJabatan
			FROM login JOIN tbl_pekerjaan ON login.idKaryawan = tbl_pekerjaan.idKaryawan
			JOIN tbl_organisasi ON tbl_organisasi.idOrg = tbl_pekerjaan.idOrg
			JOIN tbl_jabatan ON tbl_jabatan.idJabatan = tbl_pekerjaan.idJabatan
			ORDER by login.id_login asc ");
		$this->load->view('tampil_access',array('data' => $data));
	}
	public function level($idKaryawan,$level){
		if($idKaryawan==$this->session->userdata('id')){
			redirect("login/tampil");
		}	
		else{
			$row 	= $this->db->query('SELECT statusAkun FROM login where idKaryawan = "'.$idKaryawan.'"');
			$status 	= $row->row();
			$k = $status->statusAkun;
			if($k==2) {
			}
			else{
				$data = array(
				'level' => $level,
				'statusAkun'=>0,
				);

				$row 	= $this->db->query('SELECT email FROM login where idKaryawan = "'.$idKaryawan.'"');
				$mail 	= $row->row();
				$email 	= $mail->email;

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
				

				$enc_id=md5(sha1($idKaryawan));
				$this->email->initialize($config);

				$this->email->from('kkicempaka@gmail.com','Suara Merdeka');
				$this->email->to($email);
				$this->email->cc('');
				$this->email->bcc('');

				$this->email->subject('Perubahan Level Akun');
				$this->email->message("Anda Telah terdaftar $level di pegawai suara merdeka, silahkan klik link ini untuk mengakfikan akun :". anchor("login/verificati/$enc_id",'aktifasi akun pegawai suara merdeka') );
				error_reporting(E_ALL);

					if($this->email->send()){
						$where = array('idKaryawan' => $idKaryawan);
						$this->db->update('login',$data,$where);	
						redirect("login/tampil");
					}
					else{
						echo $this->email->print_debugger();
					}
			}
		}
	}

	public function cari(){
		$cari= $this->input->get('input_cari');
		$data_organisasi = $this->model->GetData("tbl_organisasi ORDER BY idOrg ASC");
		$data_jabatan = $this->model->GetData("tbl_jabatan ORDER BY idJabatan ASC");
		$this->load->view('nav',array('data_organisasi' => $data_organisasi,'data_jabatan' => $data_jabatan));
		$data = $this->model->GetD("login.id_login,login.idKaryawan, login.username, login.level, tbl_pekerjaan.idKaryawan, tbl_organisasi.namaOrg, tbl_jabatan.namaJabatan
			FROM login JOIN tbl_pekerjaan ON login.idKaryawan = tbl_pekerjaan.idKaryawan
			JOIN tbl_organisasi ON tbl_organisasi.idOrg = tbl_pekerjaan.idOrg
			JOIN tbl_jabatan ON tbl_jabatan.idJabatan = tbl_pekerjaan.idJabatan
			where login.username like '%$cari%'
			ORDER by login.id_login asc ");
		$this->load->view('tampil_access',array('data' => $data));
	}

	public function editAkun(){
		$id = $this->session->userdata('id');
		$d = $this->model->GetData("login where idKaryawan = '$id'");
		include 'aes/AES.php';
		$blockSize = 256;
		$aes = new AES($blockSize);
		$enc = $d[0]['password'];
		$aes->setData($enc);
		$dec = $aes->decrypt();

		$data = array(
			'idKaryawan'			=> $d[0]['idKaryawan'],
			'username' 				=> $d[0]['username'],
			'password'	 			=> $dec,
			'email'	 				=> $d[0]['email'],
			);
		$this->load->view('nav');
		$this->load->view('edit_akun',$data);
	}

	public function editkanAkun($id){
		$deskripsi = $this->input->post('password');
		include 'aes/AES.php';
		$imputKey = "sistempegawai@sm";
		$blockSize = 256;
		$aes = new AES($blockSize, $deskripsi);
		$enc = $aes->encrypt();
		
		$email = $this->input->post('email');
		$query = $this->CI->db->get_where("login", array('email'=>$email));
		if($query->num_rows() == 1) {
			redirect("welcome");
		}
		else{
		if($email!==$this->session->userdata('email'))
		{
			$nama = $this->session->userdata('username');
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
				

				$enc_id=md5(sha1($id));
				$this->email->initialize($config);

				$this->email->from('kkicempaka@gmail.com','Suara Merdeka');
				$this->email->to($email);
				$this->email->cc('');
				$this->email->bcc('');

				$this->email->subject('Perubahan Email Akun');
				$this->email->message("Hei $nama , Anda Telah merubah email anda di pegawai suara merdeka, silahkan klik link ini untuk mengakfikan akun :". anchor("login/verificati/$enc_id",'aktifasi akun pegawai suara merdeka') );
				error_reporting(E_ALL);

					if($this->email->send()){
						$data = array(
							'email'			=> $email,
							'password'		=> $enc,
							'statusAkun'	=> 0,
						);
						$data2 = array('eMail'=> $email);
						$where = array('idKaryawan' => $this->session->userdata('id'));
						$data = $this->db->update('login',$data,$where);
						$data = $this->db->update('tbl_karyawan',$data2,$where);
						$this->simple_login->kembali();	
					}
					else{
						echo $this->email->print_debugger();
					}
					if($data >= 1){
						if($id==$this->session->userdata('id')){
							$this->simple_login->kembali();	
						}
					}
		}
		else if($enc!==$this->session->userdata('password')){
		$data = array(
			'password'		=> $enc,
		);

		$where = array('idKaryawan' => $this->session->userdata('id'));
		$data = $this->db->update('login',$data,$where);
		if($data >= 1){
						if($id==$this->session->userdata('id')){
							$this->simple_login->kembali();	
						}
					}
		}
		
		else{
		redirect("welcome");
		}
		}
	}
	
	public function verification($key)
		{
		 $this->load->helper('url');
		 $this->load->model('model');
		 $row 	= $this->db->query('SELECT statusAkun FROM login where md5(sha1(username)) = "'.$key.'"');
		 $status 	= $row->row();
		 $k = $status->statusAkun;
		 $this->model->changeActiveState($key,$k);
		 redirect("login");
		}

	public function verificati($key)
		{
		 $this->load->helper('url');
		 $this->load->model('model');
		 $row 	= $this->db->query('SELECT statusAkun FROM login where md5(sha1(idKaryawan)) = "'.$key.'"');
		 $status 	= $row->row();
		 $k = $status->statusAkun;
		 $this->model->changeActiveStateId($key,$k);
		 redirect("welcome");
		}
	public function veriPass(){
		$CI = NULL;
		$this->CI =& get_instance();

		$email = $this->input->post('email');
		$query = $this->CI->db->get_where("login", array('email'=>$email));
		if($query->num_rows() == 1) {

		$d = $this->model->GetData("login where email = '$email'");
		$idKaryawan = $d[0]['idKaryawan'];
		$username = $d[0]['username'];
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
			$config['mailtype'] = 'html';
			$config['crlf'] = "\r\n";
			$config['validation'] = TRUE;
			

	
			$key=md5(sha1($idKaryawan));
	
			$this->email->initialize($config);
			$this->email->from('kkicempaka@gmail.com','Suara Merdeka');
			$this->email->to($email);
			$this->email->cc('');
			$this->email->bcc('');

			$this->email->subject('Reset Password');
			$this->email->message("Hei mr/mrs $username, kami akan membantu anda untuk mereset password anda dengan klik :".anchor("login/lupaPass/$key",'Reset Password Web Pegawai Suara Merdeka') );
			error_reporting(E_ALL);

				if($this->email->send()){
					$this->CI->session->set_flashdata('sukses','<font color=red>kami sudah mengirim link di email anda</font>');
				redirect(base_url('login'));
				}
				else{
					echo $this->email->print_debugger();
					echo "email anda salah";}
		}
		else{
				$this->CI->session->set_flashdata('sukses','<font color=red>Oops... Email anda belum terdaftar di sistem pegawai Suara Merdeka</font>');
				redirect(base_url('login'));
			}
	}
	public function lupaPass($key){
 		$d = $this->model->GetData("login where md5(sha1(idKaryawan)) = '$key'");
		$data = array(
			'idKaryawan'			=> $d[0]['idKaryawan'],
			'username' 				=> $d[0]['username'],
			);
		$this->load->view('lupaPass',$data);
	}

	public function resetPass(){
		$CI = NULL;
		$this->CI =& get_instance();
		$idKaryawan = $this->input->post('idKaryawan');
		$pass1 = $this->input->post('password');
		if ($pass1!=""){
			include 'aes/AES.php';
			$blockSize = 256;
			$aes = new AES($blockSize,$pass1);
			$enc = $aes->encrypt();
			$data = array(
			'password'		=> $enc,
			);
			$where = array('idKaryawan' => $idKaryawan);
			$data = $this->db->update('login',$data,$where);
			$this->CI->session->set_flashdata('sukses','<font color=red>Password anda telah dirubah</font>');
				redirect(base_url('login'));
		}
		else{
			$this->CI->session->set_flashdata('sukses','<font color=red>Password anda berbeda</font>');
				redirect(base_url('login'));
		}
	}
	// public function lupaPass(){
	// 	$email = $this->input->post('email');
	// 	$valid->set_rules('email','email','required');
	// 	$this->load->library('email');
	// 		$config = array();
	// 		$config['useragent'] = 'Codeigniter';
	// 		$config['protocol']    = 'smtp';
	// 		$config['smtp_host']    = 'ssl://smtp.gmail.com';
	// 		$config['smtp_port']    = '465';
	// 		$config['smtp_timeout'] = '400';
	// 		$config['smtp_user']    = 'kkicempaka@gmail.com';
	// 		$config['smtp_pass']    = 'udinuspolke1';
	// 		$config['charset']    = 'utf-8';
	// 		$config['newline']    = "\r\n";
	// 		$config['mailtype'] = 'html'; // or html
	// 		$config['crlf'] = "\r\n";
	// 		$config['validation'] = TRUE;
			

	// 		$enc_nm=md5($namaLengkap);
	// 		$this->email->initialize($config);
	// 		$this->email->set_mailtype("html");
	// 		$this->email->from($config['user'],'Suara Merdeka');
	// 		$this->email->to($email);
	// 		$this->email->cc('');
	// 		$this->email->bcc('');

	// 		$this->email->subject('Email Test');
	// 		$this->email->message("silahkan masukkan password baru di sistem pegawai suara merdeka :". anchor('login/password/$enc_nm','aktifasi akun pegawai suara merdeka') );
	// 		error_reporting(E_ALL);

	// 			if($this->email->send()){
	// 			}
	// 			else{
	// 				echo $this->email->print_debugger();
	// 				echo "email anda salah";}

	//}
	// public function email(){
	// 	$this->load->model('model');
	// 	$a=5;
	// 	$this->load->library('encrypt');
	// 	$b=$this->encrypt->encode($a);
	// 	$c=$this->encrypt->decode($b);
	// 	echo $b;
	// 	echo $c;
	// }
	// public function algoritma(){
	// 	$this->load->library('GibberishAES');
	// 	$chiper="udinuss";
	// 	$key="suaraMerdeka";
	// 	$encrypted_string = $this->gibberishaes->enc($chiper, $key);
	// 	$decrypted_string = $this->gibberishaes->dec($encrypted_string, $key);
	// 	echo $encrypted_string;
	// 	echo $decrypted_string;
	// 	echo md5(1);
	// 	}
// 		public function aes(){
// include 'aes/AES.php';
// $imputText = "udinus";
// $imputKey = "sistempegawai@sm";
// $blockSize = 256;
// $aes = new AES($imputText, $imputKey, $blockSize);
// $enc = $aes->encrypt(); 
// $aes->setData($enc);
// $dec=$aes->decrypt();
// echo "After encryption: ".$enc."<br/>";
// echo "After decryption: ".$dec."<br/>";
// }
// 		public function enc_ci(){
// 			$psss = '123456';
// $salt = rand(0, 1000000);
// echo $encrypted_string = sha1($psss . $salt);
// 		}
// 		public function encryption(){
// 			$this->load->library('encryption');
// 			$this->encryption->initialize(
// 		        array(
// 		                'cipher' => 'aes-256',
// 		                'mode' => 'ctr',
// 		                'key' => '{a@suaramerdeka}'
// 		        )
// 				);
// 						// Switch to the MCrypt driver
// 			$this->encryption->initialize(array('driver' => 'mcrypt'));

// 			// Switch back to the OpenSSL driver
// 			$this->encryption->initialize(array('driver' => 'openssl'));
// 			$ciphertext = $this->encryption->encrypt('This is a plain-text message!');
// 			// Outputs: This is a plain-text message!
// 			echo $this->encryption->decrypt($ciphertext);
// 			echo $ciphertext;
// 		}
	// public function Password(){
	// //Number of times to rehash
	// 	$rotations = 0 ;
	// 	$password="aadsdasdsadasd";
	// 	$username="dfdfsdfdf";
	
		

	// 	$hash = $password;


	// 	for ( $i = 0; $i<$rotations; $i ++ ) {
	// 	  $hash = hash('sha256', $hash);
	// 	}

	// 	// $s=hash('sha224','hjgjhghjg');
	// 	// echo $s;
	// 	// if($s=hash('sha224','a')){
	// 	// 	echo "berhasil";
	// 	// }
	// 	// else{
	// 	// 	echo "tidak berhasil";
	// 	//}
	// 	echo md5(5);

	// }

// 	function is_valid_password(){
// 		$salt = substr($dbpassword, 0, 64);

// 		$hash = $salt . $password;

// 		for ( $i = 0; $i < $this->rotations; $i ++ ) {
// 				$hash = hash('sha256', $hash);
// 		}

// 		//Sleep a bit to prevent brute force
// 		time_nanosleep(0, 400000000);
// 		$hash = $salt . $hash;

// 		return $hash == $dbpassword;


// 	}
// }
}