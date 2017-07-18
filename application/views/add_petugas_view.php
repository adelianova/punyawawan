<?php
    if(!$this->session->userdata('user'))
    {
    	redirect('home');
    }

    if($this->session->userdata('role') != 'super_admin'){
       	redirect('home/anggota_petugas');
    }
?>
<div id="page-wrapper">
	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Tambah Petugas</h1>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Form Tambah Petugas
                        </div>
                        <!-- /.panel-heading -->
                        <form method="post" action="<?php echo base_url('index.php/home/save_petugas');?>" enctype="multipart/form-data">
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
									<label>Id Petugas</label>
								    <input type="text" class="form-control" value="AUTO" name="id_petugas" disabled>
								</div>
								<div class="form-group">
									<label>Username</label>
								    <input type="text" class="form-control" name="username_petugas">
								</div>
								<div class="form-group">
									<label>Password</label>
								    <input type="text" class="form-control" name="password_petugas">
								</div>
								<div class="form-group">
									<label>Nama</label>
								    <input type="text" class="form-control" name="nama_petugas">
								</div>
								<div class="form-group">
									<label>Tempat Lahir</label>
								    <input type="text" class="form-control" name="tempatlahir_petugas">
								</div>
								<div class="form-group">
									<label>Tanggal Lahir</label>
								    <input type="date" class="form-control" name="tanggallahir_petugas">
								</div>
								<div class="form-group">
									<label>Alamat</label>
								    <input type="text" class="form-control" name="alamat_petugas">
								</div>
								<div class="form-group">
									<label>Role</label>
								    <input type="text" class="form-control" name="role_petugas" value="admin" disabled>
								</div>
								<div class="form-group">
									<label>Jenis Kelamin</label>
								    <select class="form-control" name="jk_petugas" >
                                        <option value="">---- Pilih Jenis Kelamin ----</option>
                                        <option value="Laki-laki">Laki-laki</option>
                                        <option value="Perempuan">Perempuan</option>
                                    </select>
								</div>
								<div class="form-group">
									<label>Foto Petugas</label>
								    <input type="file" class="form-control" name="file_petugas">
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