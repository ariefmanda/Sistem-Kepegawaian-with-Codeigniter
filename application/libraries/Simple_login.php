<?php if(! defined('BASEPATH')) exit('Akses langsung tidak diperbolehkan'); 

class Simple_login {
	// SET SUPER GLOBAL
	var $CI = NULL;
	public function __construct() {
		$this->CI =& get_instance();
	}
	// Fungsi login
	public function akun($email,$password,$level) {

					$sts 	= $this->CI->db->query('SELECT statusAkun FROM login where email = "'.$email.'"');
					$akun 	= $sts->row();
					$ak 	= $akun->statusAkun;
					$aktif="aktif";
					$query = $this->CI->db->get_where('login',array('email'=>$email,'password' => $password,'level' => $level));
				if($query->num_rows() == 1) {
					if($ak==2){
						$this->CI->session->set_flashdata('sukses','<font color=red>Oops... status kerja anda sudah tidak aktif</font>');
						redirect(base_url('login'));
					}
					else if($ak==0){
							$this->CI->session->set_flashdata('sukses','<font color=red>Oops... Akun Anda belum terverivikasi</font>');
							redirect(base_url('login'));
					}
					else{
					$row 	= $this->CI->db->query('SELECT idKaryawan FROM login where email = "'.$email.'"');
					$ro 	= $this->CI->db->query('SELECT username FROM login where email = "'.$email.'"');
					$akun 	= $row->row();
					$adm 	= $ro->row();
					$id 	= $akun->idKaryawan;
					$username = $adm->username;
					$this->CI->session->set_userdata('username', $username);
					$this->CI->session->set_userdata('email', $email);
					$this->CI->session->set_userdata('level', $level);
					$this->CI->session->set_userdata('id_login', uniqid(rand()));
					$this->CI->session->set_userdata('aktif', $aktif);
					$this->CI->session->set_userdata('password', $password);
					$this->CI->session->set_userdata('id', $id);
					session_start();
					redirect(base_url('welcome'));
					}}
				else{
					$this->CI->session->set_flashdata('sukses','<font color=red>Oops... Username/password salah</font>');
					redirect(base_url('login'));
				}
			
		return false;
	}
	// Proteksi halaman
	public function cek() {
		if($this->CI->session->userdata('level') == "" ) {
			$this->CI->session->set_flashdata('sukses','<font color=red>Anda belum login</font>');
			redirect(base_url('login'));
		}
	}
	
	// Fungsi logout
	public function logout() {
		$this->CI->session->unset_userdata('email');
		$this->CI->session->unset_userdata('aktif');
		$this->CI->session->unset_userdata('password');
		$this->CI->session->unset_userdata('username');
		$this->CI->session->unset_userdata('level');
		$this->CI->session->unset_userdata('id_login');
		$this->CI->session->unset_userdata('id');
		$this->CI->session->set_flashdata('sukses','Anda berhasil logout');
		redirect(base_url('login'));
	}
	public function kembali() {
		$this->CI->session->unset_userdata('email');
		$this->CI->session->unset_userdata('aktif');
		$this->CI->session->unset_userdata('password');
		$this->CI->session->unset_userdata('username');
		$this->CI->session->unset_userdata('level');
		$this->CI->session->unset_userdata('id_login');
		$this->CI->session->unset_userdata('id');
		$this->CI->session->set_flashdata('sukses','Anda berhasil mengedit akun anda ');
		redirect(base_url('login'));
	}
	public function hapus() {
		$this->CI->session->unset_userdata('email');
		$this->CI->session->unset_userdata('aktif');
		$this->CI->session->unset_userdata('password');
		$this->CI->session->unset_userdata('username');
		$this->CI->session->unset_userdata('level');
		$this->CI->session->unset_userdata('id_login');
		$this->CI->session->unset_userdata('id');
		$this->CI->session->set_flashdata('sukses','akun anda sudah dihapus <br> segera inputkan lagi dengan pimpinan anda');
		redirect(base_url('login'));
	}
}