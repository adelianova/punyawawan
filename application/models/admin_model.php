<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_model extends CI_Model {

	public function do_login()
	{
		$username = $this->input->post('username');
		$password = $this->input->post('password');

		$query = $this->db->get_where('petugas',array('username' => $username, 'password' => $password));

		if($query->num_rows() > 0){
			return TRUE;
		}else{
			return FALSE;
		}
	}

	public function get_id_petugas()
	{
		# code...
		$username = $this->input->post('username');

		$this->db->select('id_petugas')
				 ->from('petugas')
				 ->where('username',$username);

		$query = $this->db->get();

		if($query->num_rows() > 0)
		{
			$sql = $query->row();
			return $sql->id_petugas;
		}
	}

	public function get_role_petugas($id_petugas)
	{
		# code...
		$this->db->select('role_petugas')
				 ->from('data_petugas')
				 ->where('id_petugas',$id_petugas);

		$query = $this->db->get();

		if($query->num_rows() > 0)
		{
			$sql = $query->row();
			return $sql->role_petugas;
		}
	}

	public function insert($foto)
	{
		$data = array(
				'id_petugas' => NULL,
				'nama_petugas' => $this->input->post('nama_petugas'),
				'alamat_petugas' => $this->input->post('alamat_petugas'),
				'role_petugas' => 'admin',
				'foto_petugas' => $foto['file_name'],
				'jk_petugas' => $this->input->post('jk_petugas'),
				'ttl_petugas' => $this->input->post('tempatlahir_petugas').", ".$this->input->post('tanggallahir_petugas')
			);

		$this->db->insert('data_petugas',$data);

		$usrdata = array(
				'id_petugas' => NULL,
				'username' => $this->input->post('username_petugas'),
				'password' => $this->input->post('password_petugas')
			);

		$this->db->insert('petugas',$usrdata);

		if($this->db->affected_rows() > 0)
		{
			return TRUE;
		}else{
			return FALSE;
		}
	}

	public function insert_pengunjung($foto)
	{
			$data = array(
					'nik_pengunjung' => $this->input->post('nik_pengunjung'),
					'nama_pengunjung' => $this->input->post('nama_pengunjung'),
					'alamat_pengunjung' => $this->input->post('alamat_pengunjung'),
					'role_pengunjung' => $this->input->post('role_pengunjung'),
					'foto_pengunjung' => $foto['file_name'],
					'ttl_pengunjung' => $this->input->post('tempatlahir_pengunjung').", ".$this->input->post('tanggallahir_pengunjung'),
					'jk_pengunjung' => $this->input->post('jk_pengunjung')
				);

		$this->db->insert('data_pengunjung',$data);

			$usrdata = array(
					'nik_pengunjung' => $this->input->post('nik_pengunjung'),
					'no_kartu' => $this->input->post('no_kartu'),
					'faskes_t1' => $this->input->post('faskes_t1')
				);

			$this->db->insert('kartu_sehat',$usrdata);

		if($this->db->affected_rows() > 0)
		{
			return TRUE;
		}else{
			return FALSE;
		}
	}

	public function get_petugas()
	{
		return $this->db->get('data_petugas')
						->result();
	}

	public function get_petugas_use($id)
	{
		return $this->db->get_where('petugas',array('id_petugas' => $id))
						->row();
	}

	public function get_petugas_detail($id)
	{
		# code...
		return $this->db->get_where('data_petugas',array('id_petugas' => $id))
						->row();
	}

	public function get_petugas_search($nama)
	{
		return $this->db->like('nama_petugas',$nama)
						->get('data_petugas')
						->result();

	}

	public function get_pengunjung()
	{
		return $this->db->get('data_pengunjung')
						->result();
	}

	public function get_pengunjung_detail($id)
	{
		# code...
		return $this->db->get_where('data_pengunjung',array('nik_pengunjung' => $id))
						->row();
	}

	public function get_kartu($id)
	{
		# code...
		return $this->db->get_where('kartu_sehat',array('nik_pengunjung' => $id))
						->row();
	}

	public function get_obat()
	{
		return $this->db->get('obat')
						->result();
	}

	public function get_obat_search($nama)
	{
		return $this->db->like('nama_obat',$nama)
						->get('obat')
						->result();
	}

	public function get_transaksi()
	{
		return $this->db->get('transaksi')
						->result();
	}

	public function get_pengunjung_search($nama)
	{
		return $this->db->like('nama_pengunjung',$nama)
						->get('data_pengunjung')
						->result();
	}

	public function get_suplier()
	{
		return $this->db->get('suplier')
						->result();
	}

	public function del_petugas($id)
	{
		return $this->db->delete('petugas',array('id_petugas' => $id));
	}

	public function del_data_petugas($id)
	{
		return $this->db->delete('data_petugas',array('id_petugas' => $id));
	}

	public function del_pengunjung($id)
	{
		return $this->db->delete('kartu_sehat',array('nik_pengunjung' => $id));
	}

	public function del_data_pengunjung($id)
	{
		return $this->db->delete('data_pengunjung',array('nik_pengunjung' => $id));
	}

	public function del_obat($id)
	{
		# code...
		return $this->db->delete('obat',array('id_obat' => $id));
	}

	public function show_harga($obat)
	{
		$sql = $this->db->where('nama_obat',$obat)
						->get('obat');

		if($sql->num_rows() > 0)
		{
			return TRUE;
		}else{
			return FALSE;
		}
	}

	public function harga($obat){
		$this->db->select('harga_obat')
				 ->from('obat')
				 ->where('nama_obat',$obat);

		$query = $this->db->get();

		if($query->num_rows() > 0)
		{
			$sql = $query->row();
			return $sql->harga_obat;
		}
	}

	public function save_transaksi()
	{
		$data = array(
				'id_transaksi' => NULL, 
				'nik_pengunjung' => $this->input->post('nik_pem_transaksi'),
				'nama_obat' => $this->input->post('nama_obat_tran'),
				'jumlah_obat' => $this->input->post('jum_obat_transaksi'),
				'total_harga' => $this->input->post('tot_harga_tran'),
				'foto_resep' => '-',
				'rumah_sakit' => '-'
			);

		$this->db->insert('transaksi',$data);

		if($this->db->affected_rows() > 0)
		{
			return TRUE;
		}else{
			return FALSE;
		}
	}

	public function add_obat_b($id_suplier)
	{
		$data = array(
				'id_obat' => $this->input->post('id_obat_b'), 
				'id_supplier' => $id_suplier,
				'nama_obat' => $this->input->post('nama_obat_b'),
				'harga_obat' => $this->input->post('harga_obat_b'),
				'role_obat' => $this->input->post('role_obat_b'),
				'stock_obat' => $this->input->post('jumlah_obat_b')
			);

		$this->db->insert('obat',$data);

		if($this->db->affected_rows() > 0)
		{
			return TRUE;
		}else{
			return FALSE;
		}
	}

	public function get_jum_obat($obat)
	{
		$this->db->select('stock_obat')
				 ->from('obat')
				 ->where('nama_obat',$obat);

		$query = $this->db->get();

		if($query->num_rows() > 0)
		{
			$sql = $query->row();
			return $sql->stock_obat;
		}
	}

	public function update_jum_obat($obat,$jum)
	{
		return $this->db->where('nama_obat',$obat)
				 		->update('obat',array('stock_obat' => $jum));
	}

	public function get_id_sup($nama_suplier)
	{
		$this->db->select('id_suplier')
				 ->from('suplier')
				 ->where('nama_suplier',$nama_suplier);

		$query = $this->db->get();

		if($query->num_rows() > 0)
		{
			$sql = $query->row();
			return $sql->id_suplier;
		}
	}

	public function insert_tran_resep($foto)
	{
		# code...
		if($this->input->post('nik_pengunjung_transaksi') != '-'){
			$data = array(
						'nik_pengunjung' => $this->input->post('nik_pengunjung_transaksi'),
						'nama_obat' => $this->input->post('obat_transaksi'),
						'jumlah_obat' => '-',
						'total_harga' => '-',
						'foto_resep' => $foto['file_name'],
						'rumah_sakit' => $this->input->post('rumah_sakit_resep')
						);

			$this->db->insert('transaksi', $data);
		}else{
			$data = array(
						'nik_pengunjung' => $this->input->post('nik_pengunjung_transaksi_b'),
						'nama_obat' => $this->input->post('obat_transaksi'),
						'jumlah_obat' => '-',
						'total_harga' => '-',
						'foto_resep' => $foto['file_name'],
						'rumah_sakit' => $this->input->post('rumah_sakit_resep')
						);

			$this->db->insert('transaksi', $data);
		}

		if($this->db->affected_rows() > 0)
		{
			return TRUE;
		}else{
			return FALSE;
		}
	}

	public function get_id_admin($username)
	{
		$this->db->select('id_petugas')
				 ->from('petugas')
				 ->where('username',$username);

		$query = $this->db->get();

		if($query->num_rows() > 0)
		{
			$sql = $query->row();
			return $sql->id_petugas;
		}
	}

	public function upd_petugas($id)
	{
		$data = array(
					'nama_petugas' => $this->input->post('nama_petugas'), 
					'alamat_petugas' => $this->input->post('alamat_petugas'), 
					'role_petugas' => $this->input->post('role_petugas'), 
					'jk_petugas' => $this->input->post('jk_petugas'),
					'ttl_petugas' => $this->input->post('ttl_petugas')
			);
		return $this->db->where('id_petugas',$id)
				 		->update('data_petugas',$data);
		# code...
	}

	public function updt_petugas($id)
	{
		# code...
		$datas = array(
					'username' => $this->input->post('username_petugas'), 
					'password' => $this->input->post('password_petugas'), 
			);

		return $this->db->where('id_petugas',$id)
				 		->update('petugas',$datas);
	}

	public function upd_pengunjung($id)
	{
		$data = array(
					'nama_pengunjung' => $this->input->post('nama_pengunjung'), 
					'alamat_pengunjung' => $this->input->post('alamat_pengunjung'), 
					'role_pengunjung' => $this->input->post('role_pengunjung'), 
					'ttl_pengunjung' => $this->input->post('ttl_pengunjung'),
					'jk_pengunjung' => $this->input->post('jk_pengunjung')
			);
		return $this->db->where('nik_pengunjung',$id)
				 		->update('data_pengunjung',$data);
		# code...
	}

	public function updt_pengunjung($id)
	{
		# code...
		$datas = array(
					'no_kartu' => $this->input->post('no_kartu'), 
					'faskes_t1' => $this->input->post('faskes_t1'), 
			);

		$this->db->where('nik_pengunjung',$id)
		 		 ->update('kartu_sehat',$datas);
	}

	public function nik_pengunjung($id)
	{
		# code...
		$this->db->select('nik_pengunjung')
				 ->from('transaksi')
				 ->where('id_transaksi',$id);

		$query = $this->db->get();

		if($query->num_rows() > 0)
		{
			$sql = $query->row();
			return $sql->nik_pengunjung;
		}
	}

	public function valid_pengunjung($nik)
	{
		# code...
		$query = $this->db->get_where('data_pengunjung',array('nik_pengunjung' => $nik));

		if ($query->num_rows() > 0) {
			# code...
			return TRUE;
		}else{
			return FALSE;
		}
	}

	public function get_detail_transaksi($id,$valid)
	{
		# code...
		if($valid == TRUE){
			return $this->db->where('id_transaksi',$id)
							->join('data_pengunjung', 'data_pengunjung.nik_pengunjung = transaksi.nik_pengunjung')
							->join('obat','obat.nama_obat = transaksi.nama_obat')
							->get('transaksi')
							->row();
		}else{
			return $this->db->where('id_transaksi',$id)
							->join('obat','obat.nama_obat = transaksi.nama_obat')
							->get('transaksi')
							->row();
		}
	}
}