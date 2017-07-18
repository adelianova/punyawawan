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
				<h1 class="page-header">Form Pembelian Obat</h1>
                        <!-- /.panel-heading -->
                        	<ul class="nav nav-tabs">
                        		<li class="active">
                        			<a href="#noresep" data-toggle="tab" aria-expanded="true">Form Pembelian Tanpa Resep</a>
                        		</li>
                        		<li>
                        			<a href="#wresep" data-toggle="tab" aria-expanded="true">Form Pembelian Menggunakan Resep</a>
                        		</li>
                        		<li>
                        			<a href="#tbtransaksi" data-toggle="tab" aria-expanded="true">Tabel Semua Transaksi</a>
                        		</li>
                        	</ul>
                        	<div class="tab-content">
                        		<div class="tab-pane fade active in" id="noresep">
			                        <form method="post" action="<?php echo base_url('index.php/home/add_transaksi');?>" enctype="multipart/form-data">
				                        <div class="panel-body">
					                        <?php
				                      			if($this->session->flashdata('trannotif'))
				                        		{
				                            		echo '<div class="alert alert-danger alert-dismissible">';
				                            		echo $this->session->flashdata('trannotif');
				                            		echo '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>';
				                            		echo '</div>';
				                        		}elseif($this->session->flashdata('trannotifs')){
				                        			echo '<div class="alert alert-success alert-dismissible">';
				                            		echo $this->session->flashdata('trannotifs');
				                            		echo '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>';
				                            		echo '</div>';
				                        		}
				                    		?>
											<div class="form-group">
												<label>NIK Pengunjung</label>
											    <select class="form-control" name="nik_pengunjung_transaksi" >
			                                        <option value="">---- Pilih NIK Pengunjung ----</option>
			                                        <option value="-">Belum Menjadi Anggota</option>
			                                    <?php
			                                        foreach ($nik_pengunjung as $nik) {
			                                        	# code...
			                                    ?>
			                                        <option value="<?php echo $nik->nik_pengunjung?>"><?php echo $nik->nik_pengunjung?></option>
			                                    <?php
			                                        }
			                                    ?>
			                                    </select>
											</div>
											<div class="form-group">
												<label>NIK Pengunjung Baru</label>
											    <input type="text" class="form-control" name="nik_pengunjung_transaksi_b">
											    <span>*jika belum menjadi anggota</span>
											</div>
											<div class="form-group">
												<label>Nama Obat</label>
											    <select class="form-control" name="obat_transaksi" >
			                                        <option value="">---- Pilih Obat ----</option>
			                                    <?php
			                                        foreach ($nama_obat as $obat) {
			                                        	# code...
			                                    ?>
			                                        <option value="<?php echo $obat->nama_obat?>"><?php echo $obat->nama_obat?></option>
			                                    <?php
			                                        }
			                                    ?>
			                                    </select>
											</div>
											<div class="form-group">
												<label>Banyak Obat</label>
											    <input type="number" class="form-control" name="b_obat_transaksi">
											</div>
											<div class="form-group">
												<label>Pembayaran</label>
											    <input type="number" class="form-control" name="pembayaran_transaksi">
											</div>
											<div class="form-group">
												<input type="submit" class="btn btn-primary btn-lg" value="submit" name="submit_transaksi">
											</div>
										</div>
									</form>
								</div>
								<div class="tab-pane fade" id="wresep">
			                        <form method="post" action="<?php echo base_url('index.php/home/save_pengunjung_resep');?>" enctype="multipart/form-data">
				                        <div class="panel-body">
					                        <?php
				                      			if($this->session->flashdata('trannotif'))
				                        		{
				                            		echo '<div class="alert alert-danger alert-dismissible">';
				                            		echo $this->session->flashdata('trannotif');
				                            		echo '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>';
				                            		echo '</div>';
				                        		}elseif($this->session->flashdata('trannotifs')){
				                        			echo '<div class="alert alert-success alert-dismissible">';
				                            		echo $this->session->flashdata('trannotifs');
				                            		echo '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>';
				                            		echo '</div>';
				                        		}
				                    		?>
											<div class="form-group">
												<label>NIK Pengunjung</label>
											    <select class="form-control" name="nik_pengunjung_transaksi" >
			                                        <option value="">---- Pilih NIK Pengunjung ----</option>
			                                        <option value="-">Belum Menjadi Anggota</option>
			                                    <?php
			                                        foreach ($nik_pengunjung as $nik) {
			                                        	# code...
			                                    ?>
			                                        <option value="<?php echo $nik->nik_pengunjung?>"><?php echo $nik->nik_pengunjung?></option>
			                                    <?php
			                                        }
			                                    ?>
			                                    </select>
											</div>
											<div class="form-group">
												<label>NIK Pengunjung Baru</label>
											    <input type="text" class="form-control" name="nik_pengunjung_transaksi_b">
											    <span>*jika belum menjadi anggota</span>
											</div>
											<div class="form-group">
												<label>Nama Obat</label>
											    <select class="form-control" name="obat_transaksi" >
			                                        <option value="">---- Pilih Obat ----</option>
			                                    <?php
			                                        foreach ($nama_obat as $obat) {
			                                        	# code...
			                                    ?>
			                                        <option value="<?php echo $obat->nama_obat?>"><?php echo $obat->nama_obat?></option>
			                                    <?php
			                                        }
			                                    ?>
			                                    </select>
											</div>
											<div class="form-group">
												<label>Foto Resep</label>
											    <input type="file" class="form-control" name="foto_resep">
											</div>
											<div class="form-group">
												<label>Rumah Sakit</label>
											    <input type="text" class="form-control" name="rumah_sakit_resep">
											</div>
											<div class="form-group">
												<input type="submit" class="btn btn-primary btn-lg" value="submit" name="submit_transaksi">
											</div>
										</div>
									</form>
								</div>
								<div class="tab-pane fade" id="tbtransaksi">
									<div class="col-lg-12">
					                    <div class="panel panel-default">
					                        <div class="panel-heading">
					                            Tabel Transaksi
					                        </div>
					                        <!-- /.panel-heading -->
					                        <div class="panel-body">
					                            <div class="table-responsive">
					                                <table class="table table-striped">
					                                    <thead>
					                                        <tr>
					                                            <th>Id Transaksi</th>
					                                            <th>NIK Pembeli</th>
					                                            <th>Foto Resep</th>
					                                            <th>Obat</th>
					                                            <th>Jumlah</th>
					                                            <th>Total Harga</th>
					                                            <th>Action</th>
					                                        </tr>
					                                    </thead>
					                                    <tbody>
					                                    <?php
					                                    	foreach ($transaksi as $trans) {
					                                    		# code...
					                                    ?>
					                                        <tr>
					                                            <td><?php echo $trans->id_transaksi;?></td>
					                                            <td><?php echo $trans->nik_pengunjung;?></td>
					                                            <?php
					                                            if($trans->foto_resep != '-'){
					                                            ?>
					                                            <td>
					                                            <img src="<?php echo base_url('assets/img/resep/').$trans->foto_resep;?>" style="width: 160px;height: 120px">
					                                            </td>
					                                            <?php
					                                        	}else{
					                                        		?><td><?php
					                                        		echo $trans->foto_resep;
					                                        		?></td><?php
					                                        	}
					                                            ?>
					                                            <td><?php echo $trans->nama_obat;?></td>
					                                            <td><?php echo $trans->jumlah_obat;?></td>
					                                            <td><?php echo $trans->total_harga;?></td>
					                                            <td><a class="btn btn-info" href="<?php echo base_url('index.php/home/detail_transaksi/').$trans->id_transaksi;?>"><i class="fa fa-search"></i> Lihat</a></td>
					                                        </tr>
					                                    <?php
					                                		}	
					                                    ?>
					                                    </tbody>
					                                </table>
					                            </div>
					                            <!-- /.table-responsive -->
					                        </div>
					                        <!-- /.panel-body -->
					                    </div>
                    					<!-- /.panel -->
                					</div>
								</div>
							</div>
			</div>
		</div>
	</div>
</div>