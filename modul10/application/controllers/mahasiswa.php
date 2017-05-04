<?php
	class mahasiswa extends CI_Controller
	{
		function __construct()
		{
			parent::__construct();
			$this->load->model('mahasiswa_m');
		}
		
		public function index()
		{
			$this->load->view('index');
		}
		
		public function upload_file(){
			$this->load->library('upload');
			
			$this->input->post('nObat');
			$this->input->post('kObat');
			$this->input->post('jObat');
			$this->input->post('stock');
			$this->input->post('harga');
			$this->input->post('img');
			
			
			$nmfile = "file_".time(); //nama file saya beri nama langsung dan diikuti fungsi time
			$config['upload_path'] = './upload/'; //path folder
			$config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
			$config['max_size'] = '2048'; //maksimum besar file 2M
			$config['max_width']  = '0';
			$config['max_height']  = '0';
			$config['file_name'] = $nmfile; //nama yang terupload nantinya
	 
			$this->upload->initialize($config);
			 
			if($_FILES['filefoto']['name'])
			{
				if ($this->upload->do_upload('filefoto'))
				{
					$value = $this->upload->data();
					$data = array(
					  'nama_file' =>$value['file_name'],
					  'tipe_file' =>$value['file_type'],
					);
	 
					$this->mahasiswa_m->insert_file($data); //akses model untuk menyimpan ke database
					//pesan yang muncul jika berhasil diupload pada session flashdata
					echo "<script>alert ('file berhasil di upload'); window.location.href='".base_url()."index.php/mahasiswa/activity'</script>";//jika berhasil maka akan ditampilkan form upload
				}else{
					//pesan yang muncul jika terdapat error dimasukkan pada session flashdata
					echo "<script>alert ('file gagal di upload'); window.location.href='".base_url()."index.php/mahasiswa/activity'</script>"; //jika gagal maka akan ditampilkan form upload
				}
		 	}
		}
		
		public function proses_input(){
			$noResi = $this->input->post('noR');
			$tgl = $this->input->post('tgl');
			$jenis= $this->input->post('jenis');
			$total = $this->input->post('total');
			
			$value = array(
				'noResi' => $noResi,
				'tgl_transaksi' => $tgl,
				'jenispemesanan' => $jenis,
				'totalharga' => $total
			);
			
			$inputan = $this->mahasiswa_m->insert_transaksi($value);
			
			if ($inputan){
				$this->load->view('upload');
			}
			else {
				echo "<script>alert ('Gagal Diinputkan');</script>";
			}
		}

		
		public function viewRekap(){
			$this->load->view('rekapData');
		}
		
		public function inputRekap(){
			$tgl = $this->input->post('tgl');
			$masuk = $this->input->post('masuk');
			$keluar = $this->input->post('keluar');
			
			$value = array(
				'obatmasuk' => $masuk,
				'obatkeluar' => $keluar,
				'tglRekap' => $tgl
			);
			
			$inputan = $this->mahasiswa_m->insertRekap($value);
			
			if ($inputan){
				$this->load->view('rekapData');
			}
			else {
				echo "<script>alert ('Gagal Diinputkan');</script>";
			}
			
		}
		
		public function view_mhs(){
			$this->load->database();
			$jumlah_data = $this->mahasiswa_m->jumlah_data();
			$this->load->library('pagination');
			$config['base_url'] = base_url().'index.php/mahasiswa/view_mhs/';
			$config['total_rows'] = $jumlah_data;
			$config['per_page'] = 10;
			$from = $this->uri->segment(3);
			$this->pagination->initialize($config);		
			$data['user'] = $this->mahasiswa_m->data($config['per_page'],$from);
			$this->load->view('table',$data);
		}
		
		public function delete_mahasiswa($id){
			$del = $this->mahasiswa_m->delete_mhs($id);
			if($del){
				redirect('mahasiswa/view_mhs');
			}
			else{
				echo "gagal";
			}		
		}
		
		public function edit_mahasiswa($nim)
		{
			$data['nama_obat'] = $nim;
			$this->load->view('edit_mahasiswa',$data);
		}
		
		public function action_edit_mhs($nim)
		{
			$jenis = $this->input->post('jenis');
			$harga = $this->input->post('harga');
			$stock = $this->input->post('stock');
			$where['nama_obat'] = $nim;
			$value = array(
				'jenis_obat' => $jenis,
				'harga' => $harga,
				'stok' => $stock
			);
			
			$update = $this->mahasiswa_m->edit_mahasiswa($value,$where);
			
			if($update){
				redirect('mahasiswa/view_mhs');
			}
			else{
				echo "<script>alert ('Gagal Diinputkan');</script>";
			}
		}
		
		public function activity(){
			$this->load->view('upload');
		}
		
		
	}
?>