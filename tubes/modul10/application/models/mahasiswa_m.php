<?php
	class mahasiswa_m extends CI_Model
	{
		function construct()
		{
			parent:: construct();
			$this->load->library('input');
			$this->load->library('form_validation');
		}
		
		public function insert_transaksi($value){ 
			$result = $this->db->insert("transaksi",$value);
			return $result;
		}
		
		function data($number,$offset){
			return $query = $this->db->get("dataobat",$number,$offset)->result();		
		}
 
		function jumlah_data(){
			return $this->db->get("dataobat")->num_rows();
		}
		
		public function delete_mhs($id){
			$con = array(
				'nama_obat' => $id
				);
				
			$even = $this->db->delete("dataobat",$con);
			return $even;
		}
		
		function edit_mahasiswa($value ,$where)
		{
			$this->db->where($where);
			$even = $this->db->update("dataobat",$value);
			return $even;
		}
		
		function insert_file($data){
			$result = $this->db->insert("dataobat",$data);
			return $result;
		}
		
		function get_file() {
			$this->db->select("*");
			$this->db->from("dataobat");
			$data = $this->db->get();
			if ($data->num_rows() > 0) {
				return $data->result();
			}
		}
		
		function insertRekap($value){
			$result = $this->db->insert("rekapdata",$value);
			return $result;
		}
	}
?>