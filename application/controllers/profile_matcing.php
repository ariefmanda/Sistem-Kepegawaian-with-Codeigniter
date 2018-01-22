<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile_matcing extends CI_Controller {
	public function form_master(){
		$data_organisasi = $this->model->GetData("tbl_organisasi");
		$data_jabatan = $this->model->GetData("tbl_jabatan");
		$this->load->view('nav',array('data_organisasi' => $data_organisasi,'data_jabatan' => $data_jabatan));	
		$this->load->view('form_master_karyawan_terbaik');
	}
	public function form(){
		$data_organisasi = $this->model->GetData("tbl_organisasi");
		$data_jabatan = $this->model->GetData("tbl_jabatan");
		$this->load->view('nav',array('data_organisasi' => $data_organisasi,'data_jabatan' => $data_jabatan));	
		$this->load->view('form_profile_matcing');
	}
	
	public function tambahkan($opsi){
		if($opsi == 'kriteria'){
			$aspek 		= $_POST['aspek'];
			$prosentase = $_POST['prosentase'];	
			$data = array(
				'id_aspek'		=> "",
				'aspek' 		=> $aspek,
				'prosentase'	=> $prosentase,
			);
			$add = $this->db->insert('tbl_aspek',$data);
			if($add >= 1){
				redirect("profile_matcing/form_master?page=kriteria");
			}
		} else if($opsi == 'subkriteria'){
			$id_aspek 		= $_POST['id_aspek'];
			$faktor 		= $_POST['faktor'];
			$nilai 			= $_POST['nilai'];
			$kelompok 		= $_POST['kelompok'];

			$data = array(
				'id_faktor'		=> "",
				'id_aspek' 		=> $id_aspek,
				'faktor'		=> $faktor,
				'nilai'			=> $nilai,
				'kelompok'		=> $kelompok,
			);
			$add = $this->db->insert('tbl_faktor',$data);
			if($add >= 1){
				redirect("profile_matcing/form_master?page=subkriteria");
			}
		}
	}
	public function hapus($opsi,$id){
		if($opsi == 'kriteria'){
			$where = array('id_aspek' => $id);
			$data = $this->db->Delete('tbl_aspek',$where);
			if($data >= 1){
				redirect("profile_matcing/form_master?page=kriteria");
			}
		} else if($opsi == 'subkriteria'){
			$where = array('id_faktor' => $id);
			$data = $this->db->Delete('tbl_faktor',$where);
			if($data >= 1){
				redirect("profile_matcing/form_master?page=subkriteria");
			}
		} else if($opsi == 'nilai_terbaik'){
			$this->db->Delete('tbl_test',array('idKaryawan' => $id));
			$this->db->Delete('tbl_hasil_akhir',array('idKaryawan' => $id));
			redirect("profile_matcing/form?page=terbaik");
		}
	}
	public function editkan($opsi,$id){
		if($opsi == 'kriteria'){
			$aspek 		= $_POST['aspek'];
			$prosentase = $_POST['prosentase'];
			
			$data = array(
				'aspek'			=>$aspek,
				'prosentase' 	=> $prosentase,
			);

			$where = array('id_aspek' => $id);
			$res = $this->db->update('tbl_aspek',$data,$where);
			if($res >= 1){
				redirect("profile_matcing/form_master?page=kriteria");
			}			
		} else if($opsi == 'subkriteria'){
			$id_aspek 		= $_POST['id_aspek'];
			$faktor 		= $_POST['faktor'];
			$nilai 			= $_POST['nilai'];
			$kelompok 		= $_POST['kelompok'];
			
			$data = array(
				'id_aspek' 		=> $id_aspek,
				'faktor'		=> $faktor,
				'nilai'			=> $nilai,
				'kelompok'		=> $kelompok,
			);

			$where = array('id_faktor' => $id);
			$res = $this->db->update('tbl_faktor',$data,$where);
			if($res >= 1){
				redirect("profile_matcing/form_master?page=subkriteria");
			}			
		} else if($opsi == 'nilai_gap'){
			$keterangan = $_POST['keterangan'];
			
			$data = array(
				'keterangan' 	=> $keterangan,
			);

			$where = array('selisih' => $id);
			$res = $this->db->update('tbl_bobot',$data,$where);
			if($res >= 1){
				redirect("profile_matcing/form_master?page=nilai_gap");
			}			
		} else if($opsi == 'nilai_kelompok'){
			$prosentase = $_POST['prosentase'];
			
			$data = array(
				'prosentase' 	=> $prosentase,
			);

			$where = array('nama_kelompok' => $id);
			$res = $this->db->update('tbl_kelompok',$data,$where);
			if($res >= 1){
				redirect("profile_matcing/form_master?page=nilai_kelompok");
			}			
		}
	}

	public function tambah(){
		$data_komponen = $this->model->GetD("tbl_faktor.faktor as faktor, tbl_faktor.nilai as nilai, tbl_faktor.id_faktor as id_faktor, tbl_aspek.aspek as aspek , tbl_aspek.id_aspek as id_aspek
            from tbl_faktor join tbl_aspek on tbl_aspek.id_aspek = tbl_faktor.id_aspek 
            order by tbl_aspek.id_aspek asc, tbl_faktor.id_faktor asc");
		$no=1;
		foreach ($data_komponen as $d) {
			$data = array(
				'idKaryawan' => $_POST['idKaryawan'], 
				'id_faktor' => $d['id_faktor'], 
				'nilai' =>  $_POST[$no]
				);
			$this->db->insert('tbl_test',$data);
			$no++;
		}
		$data_aspek = $this->model->GetData("tbl_aspek order by id_aspek asc");
		$data_kelompok = $this->model->GetData("tbl_kelompok");
		$total_ranking = 0;
		foreach ($data_aspek as $d) {
				$tot=0;
			foreach ($data_kelompok as $c) {
				$data = $this->model->GetD("(sum(tbl_bobot.bobot)),count(*)
					from tbl_test join tbl_faktor on tbl_faktor.id_faktor = tbl_test.id_faktor
					join tbl_karyawan on tbl_karyawan.idKaryawan = tbl_test.idKaryawan
					join tbl_bobot on tbl_bobot.selisih = (tbl_test.nilai - tbl_faktor.nilai)
					where tbl_karyawan.idKaryawan = ".$_POST['idKaryawan']." 
					and tbl_faktor.kelompok = '".$c['nama_kelompok']."' 
					and tbl_faktor.id_aspek = ".$d['id_aspek']."
					order by tbl_faktor.id_faktor ASC");
				echo "<br>";
				$total = round(($data[0]['(sum(tbl_bobot.bobot))']) / ($data[0]['count(*)']),1);
				printf($total);
				$tot = ((($c['prosentase'] / 100) * $total) + $tot);
			}
			echo "<br><br>";
			printf($tot);
			$total_ranking = ((($d['prosentase'] / 100) * $tot) + $total_ranking);
		}
		echo "<br><br>";
		$data = array(
			'id_akhir' => '',
			'idKaryawan' => $_POST['idKaryawan'],
			'hasil_akhir' => $total_ranking,
			);
		$this->db->insert('tbl_hasil_akhir',$data);
		redirect(base_url()."index.php/profile_matcing/form?page=terbaik");
	}
}