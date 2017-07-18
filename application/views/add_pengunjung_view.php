<?php
    if(!$this->session->userdata('user'))
    {
        redirect('home');
    }
?>
<div id="page-wrapper">
	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Tambah Pengunjung</h1>
				
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Form Tambah Pengunjung
                        </div>
                        <!-- /.panel-heading -->
                        <form method="post" action="<?php echo base_url('index.php/home/save_pengunjung');?>" enctype="multipart/form-data">
	                        <div class="panel-body">
		                        <?php
	                      			if($this->session->flashdata('pendnotif'))
	                        		{
	                            		echo '<div class="alert alert-danger">';
	                            		echo $this->session->flashdata('pendnotif');
	                            		echo '</div>';
	                        		}elseif($this->session->flashdata('pendnotifs')){
	                        			echo '<div class="alert alert-success">';
	                            		echo $this->session->flashdata('pendnotifs');
	                            		echo '</div>';
	                        		}
	                    		?>
								<div class="form-group">
									<label>NIK Pengunjung</label>
								    <input type="text" class="form-control" name="nik_pengunjung">
								</div>
								<div class="form-group">
									<label>Nomor Kartu</label>
								    <input type="text" class="form-control" name="no_kartu">
								</div>
								<div class="form-group">
									<label>Nama</label>
								    <input type="text" class="form-control" name="nama_pengunjung">
								</div>
								<div class="form-group">
									<label>Tempat Lahir</label>
								    <input type="text" class="form-control" name="tempatlahir_pengunjung">
								</div>
								<div class="form-group">
									<label>Tanggal Lahir</label>
								    <input type="date" class="form-control" name="tanggallahir_pengunjung">
								</div>
								<div class="form-group">
									<label>Alamat</label>
								    <input type="text" class="form-control" name="alamat_pengunjung">
								</div>
								<div class="form-group">
									<label>Faskes Tingak1</label>
								    <input type="text" class="form-control" name="faskes_t1">
								</div>
								<div class="form-group">
									<label>Role</label>
								    <select class="form-control" name="role_pengunjung" >
                                        <option value="">---- Pilih Role Pengunjung ----</option>
                                        <option value="Elder">Elder</option>
                                        <option value="Member">Member</option>
                                    </select>
								</div>
								<div class="form-group">
									<label>Jenis Kelamin</label>
								    <select class="form-control" name="jk_pengunjung" >
                                        <option value="">---- Pilih Jenis Kelamin ----</option>
                                        <option value="Laki-laki">Laki-laki</option>
                                        <option value="Perempuan">Perempuan</option>
                                    </select>
								</div>
								<div class="form-group">
									<label>Foto Pengunjung</label>
								    <input type="file" class="form-control" name="foto_pengunjung">
								</div>
								<div class="form-group">
									<input type="submit" class="btn btn-primary btn-lg" value="submit" name="submit_petugas">
								</div>
							</div>
						</form>
						</form>
					</div>
			</div>
		</div>
	</div>
</div>