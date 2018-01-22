<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model extends CI_Model {
	
	public function GetData($where=""){
		$data = $this->db->query("SELECT * FROM ".$where);
		return $data->result_array();
	}
	public function GetD($where=""){
		$data = $this->db->query("SELECT ".$where);
		return $data->result_array();
	}
	function getDepartemen($idOrg){
		$this->db->where('idOrg',$idOrg);
		$result = $this->db->get('tbl_departemen');
		if ($result->num_rows()>0){
			return $result->result_array();
		}
		else{
			return array();
		}
	}
	function getJabatan($idDept){
		$this->db->where('idDept',$idDept);
		$result = $this->db->get('tbl_jabatan');
		if ($result->num_rows()>0){
			return $result->result_array();
		}
		else{
			return array();
		}
	}
	 function tampil_upload($k){
	  $query = $this->db->query("SELECT * FROM tbl_karyawan where idKaryawan='$k'");
	  foreach($query->result_array() as $ok){

	    $image = $ok['contohBlob']; 
	  }
	  $finfo = new finfo(FILEINFO_MIME_TYPE);
	  $mime = $finfo->buffer($image);
	  //echo $this->mimetype($image);

	  header("Content-type: ".$mime);
	  // header("Content-type: image/jpeg");
	  echo $image;
	 }
	 public function changeActiveState($key,$k){
		if ($k==2){
			$this->session->set_flashdata('sukses','<font color=red>Akun anda sudah tidak bisa digunakan, silahkan hubungi Pimpinan</font>');
			redirect("login");
		}
		else{
		 	$this->load->database();
		 	$data = array(
		 		'statusAkun' => 1,
		 	);
			$this->db->where('md5(sha1(username))',$key);
			$update= $this->db->update('login', $data);
		 	if($update >= 1){
				$this->session->set_flashdata('sukses','<font color=red>Akun anda sudah aktif,silahkan login</font>');
				redirect("login");
			}
			else{
				$this->session->set_flashdata('sukses','<font color=red>Akun anda belum aktif, silahkan hubungi Pimpinan</font>');
				redirect("login");
			}
		}
	}
	public function changeActiveStateId($key,$k){
		if ($k==2){
			$this->session->set_flashdata('sukses','<font color=red>Akun anda sudah tidak bisa digunakan, silahkan hubungi Pimpinan</font>');
			redirect("login");
		}
		else{
		 	$this->load->database();
		 	$data = array(
		 		'statusAkun' => 1,
		 	);
			$this->db->where('md5(sha1(idKaryawan))',$key);
			$update= $this->db->update('login', $data);
		 	if($update >= 1){
				$this->session->set_flashdata('sukses','<font color=red>Akun anda sudah aktif,silahkan login</font>');
				redirect("login");
			}
			else{
				$this->session->set_flashdata('sukses','<font color=red>Akun anda belum aktif, silahkan hubungi Pimpinan</font>');
				redirect("login");
			}
		}
	}
	public function cek_email($eMail){
         $this->db->where('eMail',$eMail);
		$result = $this->db->get('tbl_karyawan');
        return $result->result();
         
    }
}


