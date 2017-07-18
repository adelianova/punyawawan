<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('admin_model');
	}

	public function index()
	{
		$data['main_view'] = 'index_view';
		$this->load->view('template',$data);
	}

	public function login()
	{
		if($this->input->post('submit')){
			$this->form_validation->set_rules('username', 'Username', 'trim|required');
			$this->form_validation->set_rules('password', 'Password', 'trim|required');

			if ($this->form_validation->run() == TRUE) {

				if($this->admin_model->do_login() == TRUE){
					$id_petugas = $this->admin_model->get_id_petugas();
					$data = array(
								'user' => $this->input->post('username'),
								'role' => $this->admin_model->get_role_petugas($id_petugas)
							);
					$this->session->set_userdata($data);
					$this->session->set_flashdata('notif_login', 'Login Berhasil');
					redirect('home/utama');
				}else{
					$this->session->set_flashdata('notif_login', 'Username atau Password Salah');
					redirect('home');
				}
			} else {
				$this->session->set_flashdata('notif', validation_errors());
				redirect('home');
			}
		}else{
				redirect('home');
		}
	}

	public function utama()
	{
		$data['jum_petugas'] = $this->admin_model->get_petugas();
		$data['jum_pengunjung'] = $this->admin_model->get_pengunjung();
		$data['jum_obat'] = $this->admin_model->get_obat();
		$data['jum_transaksi'] = $this->admin_model->get_transaksi();
		$data['main_view'] = 'admin_view';
		$this->load->view('template',$data);
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect('home/utama');
	}

	public function anggota_pengunjung()
	{
		if(isset($_GET['query']) && $_GET['query'] == 'cari'){
			$search_nama_pengunjung = $this->input->post('search_pengunjung');
			$data['view_pengunjung'] = $this->admin_model->get_pengunjung_search($search_nama_pengunjung);
			$data['main_view'] = 'pengunjung_view';
			$this->load->view('template',$data);
		}else{
			$data['view_pengunjung'] = $this->admin_model->get_pengunjung();
			$data['main_view'] = 'pengunjung_view';
			$this->load->view('template',$data);
		}
	}

	public function add_pengunjung()
	{
		$data['main_view'] = 'add_pengunjung_view';
		$this->load->view('template', $data);
	}

	public function anggota_petugas()
	{
		if(isset($_GET['query']) && $_GET['query'] == 'cari'){
			$search_nama_petugas = $this->input->post('search_petugas');
			$data['view_petugas'] = $this->admin_model->get_petugas_search($search_nama_petugas);
			$data['main_view'] = 'petugas_view';
			$this->load->view('template',$data);
		}else{
			$data['view_petugas'] = $this->admin_model->get_petugas();
			$data['main_view'] = 'petugas_view';
			$this->load->view('template',$data);
		}
	}

	public function add_petugas()
	{
		$data['main_view'] = 'add_petugas_view';
		$this->load->view('template', $data);
	}

	public function save_petugas()
	{
			$this->form_validation->set_rules('username_petugas', 'Username', 'trim|required');
			$this->form_validation->set_rules('password_petugas', 'Password', 'trim|required');
			$this->form_validation->set_rules('nama_petugas', 'Name', 'trim|required');
			$this->form_validation->set_rules('alamat_petugas', 'Address', 'trim|required');
			$this->form_validation->set_rules('jk_petugas', 'Gender', 'trim|required');
			$this->form_validation->set_rules('tanggallahir_petugas', 'Date of Birth', 'trim|required');
			$this->form_validation->set_rules('tempatlahir_petugas', 'Place of Birth', 'trim|required');

			if ($this->form_validation->run() == TRUE) {
				# code...
				$config['upload_path'] = './assets/img/petugas';
				$config['allowed_types'] = 'jpg|png';
				$config['max_size'] = 2000;

				//jika menambahkan library upload pada autoload
				$this->upload->initialize($config);

				//jika tidak menambahkan library upload pada autoload
				//$this->load->library('upload', $config);

				if($this->upload->do_upload('file_petugas'))
				{
					if ($this->admin_model->insert($this->upload->data()) == TRUE) {
						# code...
						$this->session->set_flashdata('pendnotifs','Penambahan Petugas Berhasil');
						redirect('home/add_petugas');
					}else{
						$this->session->set_flashdata('pendnotif','Penambahan Petugas Gagal');
						redirect('home/add_petugas');
					}
				}else{
					$this->session->set_flashdata('pendnotif',$this->upload->display_errors());
					redirect('home/add_petugas');
				}
			} else {
				# code...
				$this->session->set_flashdata('pendnotif', validation_errors());
				redirect('home/add_petugas');
			}
	}

	public function save_pengunjung()
	{
			$this->form_validation->set_rules('nik_pengunjung', 'NIK', 'trim|required');
			$this->form_validation->set_rules('no_kartu', 'No. Card', 'trim|required');
			$this->form_validation->set_rules('nama_pengunjung', 'Name', 'trim|required');
			$this->form_validation->set_rules('alamat_pengunjung', 'Address', 'trim|required');
			$this->form_validation->set_rules('jk_pengunjung', 'Gender', 'trim|required');
			$this->form_validation->set_rules('tanggallahir_pengunjung', 'Date of Birth', 'trim|required');
			$this->form_validation->set_rules('tempatlahir_pengunjung', 'Place of Birth', 'trim|required');
			$this->form_validation->set_rules('role_pengunjung', 'Role', 'trim|required');


			if ($this->form_validation->run() == TRUE) {
				# code...
				$config['upload_path'] = './assets/img/pengunjung';
				$config['allowed_types'] = 'jpg|png';
				$config['max_size'] = 2000;

				//jika menambahkan library upload pada autoload
				$this->upload->initialize($config);

				//jika tidak menambahkan library upload pada autoload
				//$this->load->library('upload', $config);

				if($this->upload->do_upload('foto_pengunjung'))
				{
					if ($this->admin_model->insert_pengunjung($this->upload->data()) == TRUE) {
						# code...
						$this->session->set_flashdata('pendnotifs','Penambahan Pengunjung Berhasil');
						redirect('home/add_pengunjung');
					}else{
						$this->session->set_flashdata('pendnotif','Penambahan Pengunjung Gagal');
						redirect('home/add_pengunjung');
					}
				}else{
					$this->session->set_flashdata('pendnotif',$this->upload->display_errors());
					redirect('home/add_pengunjung');
				}
			} else {
				# code...
				$this->session->set_flashdata('pendnotif', validation_errors());
				redirect('home/add_pengunjung');
			}
	}

	public function delete_petugas($id)
	{
		$this->admin_model->del_petugas($id);
		$this->admin_model->del_data_petugas($id);
		if($this->db->affected_rows())
		{
			$this->session->set_flashdata('notifs', 'Data Berhasil di Hapus');
			redirect('home/anggota_petugas');
		}
		else
		{
			$this->session->set_flashdata('notifg', 'Gagal Menghapus Data');
			redirect('home/anggota_petugas');	
		}
	}

	public function delete_pengunjung($id)
	{
		$this->admin_model->del_pengunjung($id);
		$this->admin_model->del_data_pengunjung($id);
		if($this->db->affected_rows())
		{
			$this->session->set_flashdata('notifs', 'Data Berhasil di Hapus');
			redirect('home/anggota_pengunjung');
		}
		else
		{
			$this->session->set_flashdata('notifg', 'Gagal Menghapus Data');
			redirect('home/anggota_pengunjung');	
		}
	}

	public function transaksi_form()
	{
		$data['nik_pengunjung'] = $this->admin_model->get_pengunjung();
		$data['transaksi'] = $this->admin_model->get_transaksi();
		$data['nama_obat'] = $this->admin_model->get_obat();
		$data['main_view'] = 'transaksi_form_view';
		$this->load->view('template', $data);
	}

	public function obat()
	{
		if(isset($_GET['query']) && $_GET['query'] == 'cari'){
			$search_nama_obat = $this->input->post('search_obat');
			$data['obat'] = $this->admin_model->get_obat_search($search_nama_obat);
			$data['main_view'] = 'obat_view';
			$this->load->view('template', $data);
		}else{
			$data['obat'] = $this->admin_model->get_obat();
			$data['main_view'] = 'obat_view';
			$this->load->view('template',$data);
		}
	}

	public function add_obat()
	{
		if($this->input->post('sub_obat')){
			$this->form_validation->set_rules('id_obat_b', 'ID', 'trim|required');
			$this->form_validation->set_rules('nik_suplier_b', 'Suplier', 'trim|required');
			$this->form_validation->set_rules('nama_obat_b', 'Obat', 'trim|required');
			$this->form_validation->set_rules('jumlah_obat_b', 'Jumlah', 'trim|required');
			$this->form_validation->set_rules('role_obat_b', 'Role', 'trim|required');
			$this->form_validation->set_rules('harga_obat_b', 'Price', 'trim|required');

			if ($this->form_validation->run() == TRUE or FALSE) {
				# code...
				$id_suplier = $this->admin_model->get_id_sup($this->input->post('nik_suplier_b'));

				if($this->admin_model->add_obat_b($id_suplier) == TRUE){
					$this->session->set_flashdata('t_obat_b_s', 'Penambahan Obat Berhasil');
					redirect('home/obat');
				}else{
					$this->session->set_flashdata('t_obat_b_g', 'Penambahan Obat Gagal');
					$data['main_view'] = 'tambah_obat_view';
					$this->load->view('template', $data);
				}
			} else {
				# code...
				$this->session->set_flashdata('t_obat_b_g', validation_errors());
				$data['main_view'] = 'tambah_obat_view';
				$this->load->view('template', $data);
			}
		}else{
			$data['obat'] = $this->admin_model->get_obat();
			$data['suplier'] = $this->admin_model->get_suplier();
			$data['main_view'] = 'tambah_obat_view';
			$this->load->view('template', $data);
		}
	}

	public function add_transaksi()
	{
		$this->form_validation->set_rules('nik_pengunjung_transaksi', 'NIK', 'trim|required');
		$this->form_validation->set_rules('obat_transaksi', 'Obat', 'trim|required');
		$this->form_validation->set_rules('pembayaran_transaksi', 'Pembayaran', 'trim|required');
		$this->form_validation->set_rules('b_obat_transaksi', 'Banyak Obat', 'trim|required');

		if ($this->form_validation->run() == TRUE) {
				# code...
				if ($this->admin_model->show_harga($this->input->post('obat_transaksi')) != FALSE) {
					# code...
					if($this->input->post('nik_pengunjung_transaksi') != '-')
					{
						$data['nik_pembeli'] = $this->input->post('nik_pengunjung_transaksi');
					}else{
						$data['nik_pembeli'] = $this->input->post('nik_pengunjung_transaksi_b');
					}
							$data['pembayaran'] = $this->input->post('pembayaran_transaksi');
							$data['obat'] = $this->input->post('obat_transaksi');
							$data['b_obat'] = $this->input->post('b_obat_transaksi');
							$harga = $this->admin_model->harga($this->input->post('obat_transaksi'));
							$total = (int)$harga * (int)$this->input->post('b_obat_transaksi');
							$data['t_harga'] = $total;
							$kembali = $this->input->post('pembayaran_transaksi') - $total;
							$data['kem_tran'] = $kembali;
							$data['main_view'] = 'out_transaksi';
							$this->load->view('template', $data);
				}else{
					$this->session->set_flashdata('trannotif','Obat Tidak Tersedia');
					redirect('home/transaksi_form');
				}
		} else {
			# code...
			$this->session->set_flashdata('trannotif', validation_errors());
			redirect('home/transaksi_form');
		}
	}

	public function save_transaksi()
	{
		if ($this->admin_model->save_transaksi() == TRUE) {
			# code...
			$jum_obat = $this->admin_model->get_jum_obat($this->input->post('nama_obat_tran'));
			$jum_obat_b = (int)$jum_obat - (int)$this->input->post('jum_obat_transaksi');
			$this->admin_model->update_jum_obat($this->input->post('nama_obat_tran'),$jum_obat_b);
			if($this->db->affected_rows()){
				$this->session->set_flashdata('trannotifs','Penambahan Transaksi Berhasil');
				redirect('home/transaksi_form');
			}
		}else{
			$this->session->set_flashdata('trannotif','Penambahan Transaksi Gagal');
			redirect('home/transaksi_form');
		}
	}

	public function add_stock()
	{
		$this->form_validation->set_rules('obat_transaksi', 'Drug Name', 'trim|required');
		$this->form_validation->set_rules('nik_suplier', 'Suplier', 'trim|required');
		$this->form_validation->set_rules('jum_obat', 'Number of Drugs', 'trim|required');

		if ($this->form_validation->run() == TRUE) {
			$jum_obat = (int)$this->input->post('jum_obat') + (int)$this->admin_model->get_jum_obat($this->input->post('obat_transaksi'));
			$this->admin_model->update_jum_obat($this->input->post('obat_transaksi'),$jum_obat);
			if($this->db->affected_rows()){
				$this->session->set_flashdata('t_obat_b_s', 'Penambahan Obat Berhasil');
				redirect('home/obat');
			}else{
				$this->session->set_flashdata('t_obat_b_g', 'Penambahan Obat Gagal');
				redirect('home/add_obat');
			}
		} else {
			$this->session->set_flashdata('t_obat_b_g', validation_errors());
				redirect('home/add_obat');
		}
	}

	public function delete_obat($id)
	{
		# code...
		$this->admin_model->del_obat($id);
		if($this->db->affected_rows())
		{
			$this->session->set_flashdata('notifs', 'Data Berhasil di Hapus');
			redirect('home/obat');
		}
		else
		{
			$this->session->set_flashdata('notifg', 'Gagal Menghapus Data');
			redirect('home/obat');	
		}
	}

	public function detail_petugas($id)
	{
		# code...
		$data['detail_petugas'] = $this->admin_model->get_petugas_detail($id);
		$data['main_view'] = 'detail_petugas_view';
		$this->load->view('template', $data);
	}

	public function detail_pengunjung($id)
	{
		# code...
		$data['detail_pengunjung'] = $this->admin_model->get_pengunjung_detail($id);
		$data['main_view'] = 'detail_pengunjung_view';
		$this->load->view('template', $data);
	}

	public function save_pengunjung_resep()
	{
		# code...
			$this->form_validation->set_rules('obat_transaksi', 'Drug', 'trim|required');
			$this->form_validation->set_rules('rumah_sakit_resep', 'Hospital', 'trim|required');
			$this->form_validation->set_rules('nik_pengunjung_transaksi', 'Pengunjung', 'trim|required');

			if ($this->form_validation->run() == TRUE) {
				# code...
				$config['upload_path'] = './assets/img/resep';
				$config['allowed_types'] = 'jpg|png';
				$config['max_size'] = 2000;

				//jika menambahkan library upload pada autoload
				$this->upload->initialize($config);

				//jika tidak menambahkan library upload pada autoload
				//$this->load->library('upload', $config);

				if($this->upload->do_upload('foto_resep'))
				{
					if ($this->admin_model->insert_tran_resep($this->upload->data()) == TRUE) {
						# code...
						$this->session->set_flashdata('trannotifs','Transaksi Berhasil');
						redirect('home/transaksi_form');
					}else{
						$this->session->set_flashdata('trannotif','Transaksi Gagal');
						redirect('home/transaksi_form');
					}
				}else{
					$this->session->set_flashdata('trannotif',$this->upload->display_errors());
					redirect('home/transaksi_form');
				}
			} else {
				# code...
				$this->session->set_flashdata('trannotif', validation_errors());
				redirect('home/transaksi_form');
			}
	}

	public function edit_pengunjung($id)
	{
		$data['main_view'] = 'edit_pengunjung';
		$data['pengunjung'] = $this->admin_model->get_pengunjung_detail($id);;
		$data['kartu'] = $this->admin_model->get_kartu($id);;
		$this->load->view('template', $data);
	}

	public function edit_petugas($id)
	{
		$data['main_view'] = 'edit_petugas';
		$data['petugas'] = $this->admin_model->get_petugas_detail($id);
		$data['usepetugas'] = $this->admin_model->get_petugas_use($id);
		$this->load->view('template', $data);
	}

	public function detail_admin($username)
	{
		# code...
		$data['main_view'] = 'profile_admin';
		$id_petugas = $this->admin_model->get_id_admin($username);
		$data['profile'] = $this->admin_model->get_petugas_detail($id_petugas);
		$this->load->view('template', $data);
	}

	public function update_petugas()
	{
		# code...
		$this->form_validation->set_rules('nama_petugas', 'Name', 'trim|required');
		$this->form_validation->set_rules('ttl_petugas', 'Born', 'trim|required');
		$this->form_validation->set_rules('alamat_petugas', 'Address', 'trim|required');

		if ($this->form_validation->run() == TRUE) {

			$this->admin_model->upd_petugas($this->input->post('id_petugas'));
			$this->admin_model->updt_petugas($this->input->post('id_petugas'));
			if($this->db->affected_rows()){
				$this->session->set_flashdata('notifs', 'Perubahan Berhasil Disimpan');
				redirect('home/anggota_petugas');
			}else{
				$this->session->set_flashdata('notifg', 'Perubahan Gagal Disimpan ');
				redirect('home/anggota_petugas');
			}
		} else {
			$this->session->set_flashdata('notifg', validation_errors());
			redirect('home/edit_petugas/'.$this->input->post('id_petugas'));
		}
	}

	public function update_usnpass()
	{
		# code...
		$this->form_validation->set_rules('username_petugas', 'Username', 'trim|required');
		$this->form_validation->set_rules('password_petugas', 'Password', 'trim|required');

		if ($this->form_validation->run() == TRUE) {

			$this->admin_model->updt_petugas($this->input->post('id_petugas'));
			if($this->db->affected_rows()){
				$this->session->set_flashdata('notifs', 'Perubahan Berhasil Disimpan');
				redirect('home/anggota_petugas');
			}else{
				$this->session->set_flashdata('notifg', 'Perubahan Gagal Disimpan ');
				redirect('home/anggota_petugas');
			}
		} else {
			$this->session->set_flashdata('notifg', validation_errors());
			redirect('home/edit_petugas/'.$this->input->post('id_petugas'));
		}
	}

	public function update_pengunjung()
	{
		# code...
		$this->form_validation->set_rules('nama_pengunjung', 'Name', 'trim|required');
		$this->form_validation->set_rules('ttl_pengunjung', 'Born', 'trim|required');
		$this->form_validation->set_rules('alamat_pengunjung', 'Address', 'trim|required');

		if ($this->form_validation->run() == TRUE) {

			$this->admin_model->upd_pengunjung($this->input->post('nik_pengunjung'));
			if($this->db->affected_rows()){
				$this->session->set_flashdata('notifs', 'Perubahan Berhasil Disimpan');
				redirect('home/anggota_pengunjung');
			}else{
				$this->session->set_flashdata('notifg', 'Perubahan Gagal Disimpan ');
				redirect('home/anggota_pengunjung');
			}
		} else {
			$this->session->set_flashdata('notifg', validation_errors());
			redirect('home/edit_pengunjung/'.$this->input->post('nik_pengunjung'));
		}
	}

	public function update_kartu($value='')
	{
		# code...
		$this->form_validation->set_rules('no_kartu', 'Card Number', 'trim|required');
		$this->form_validation->set_rules('faskes_t1', 'Faskes', 'trim|required');

		if ($this->form_validation->run() == TRUE) {

			$this->admin_model->updt_pengunjung($this->input->post('nik_pengunjung'));
			if($this->db->affected_rows()){
				$this->session->set_flashdata('notifs', 'Perubahan Berhasil Disimpan');
				redirect('home/anggota_pengunjung');
			}else{
				$this->session->set_flashdata('notifg', 'Perubahan Gagal Disimpan ');
				redirect('home/anggota_pengunjung');
			}
		} else {
			$this->session->set_flashdata('notifg', validation_errors());
			redirect('home/edit_pengunjung/'.$this->input->post('nik_pengunjung'));
		}
	}

	public function detail_transaksi($id)
	{
		# code...
		$nik_pengunjung = $this->admin_model->nik_pengunjung($id);
		$valid = $this->admin_model->valid_pengunjung($nik_pengunjung);
		$data['transaksi'] = $this->admin_model->get_detail_transaksi($id,$valid);
		$data['main_view'] = 'detail_transaksi';
		$this->load->view('template', $data);
	}
}