<?php defined('BASEPATH') or exit('No Direct script access allowed!');

class Home_model extends CI_Model 
{
	public function get_home_artikel(){
		return $this->db->join('kategori', 'kategori.id_kategori = artikel.id_kategori')
						->order_by('tanggal', 'desc')
						->where('stat', 1)
						->get('artikel',0,3)->result_array();
	}

	public function get_cabang(){
		return $this->db->where('stat', 1)->get('cabang')->result_array();
	}

	public function get_setting($param){
		return $this->db->where('param', $param)->get('setting')->row_array();
	}

	public function get_barang(){
		return $this->db->where('stat', 1)->get('barang',0,6)->result_array();
	}

	public function updateClick($tbl,$field,$value){
		$query = $this->db->query("UPDATE $tbl SET click = click + 1 WHERE $field = '$value' ");
		return $query;
	}

	public function get_row_barang($field, $kd_merk){
		return $this->db->join('kat_barang', 'barang.kd_kategori = kat_barang.kd_kategori')
									->join('jenis', 'jenis.kd_jenis = barang.kd_jenis')
									->where($field, $kd_merk)->get('barang')->row_array();
	}

	public function raw($nm_barang){
		return $this->db->where('nm_barang', $nm_barang)->get('raw');
	}



}

 ?>