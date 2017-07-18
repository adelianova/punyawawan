<?php
    if(!$this->session->userdata('user'))
    {
        redirect('home');
    }
?>
<div id="page-wrapper">
	<div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Forms</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <div class="row">
    	<div class="col-lg-12">
    		<div class="panel panel-green">
    			<div class="panel-heading">
    				Data Transaksi
    			</div>
    			<div class="panel-body">
    				<div class="row">
    					<div class="col-lg-12">
    						<form method="post" action="<?php echo base_url('index.php/home/save_transaksi');?>">
    							<div class="form-group">
                                	<label>Id Transaksi</label>
                                    <input type="text" class="form-control" disabled name="id_transaksi" value="AUTO" readonly>
                                </div>
                                <div class="form-group">
                                	<label>NIK Pembeli</label>
                                    <select class="form-control" name="nik_pem_transaksi" readonly>
			                            <option value="<?php echo $nik_pembeli;?>"><?php echo $nik_pembeli;?></option>
									</select>			                                        
                                </div>
                                <div class="form-group">
                                	<label>Nama Obat</label>
                                    <input type="text" class="form-control" name="nama_obat_tran" value="<?php echo $obat;?>" readonly>
                                </div>
                                <div class="form-group">
                                	<label>Jumlah Obat</label>
                                    <input type="number" class="form-control" name="jum_obat_transaksi" value="<?php echo $b_obat;?>" readonly>
                                </div>
                                <div class="form-group">
                                	<label>Total Harga</label>
                                    <input type="number" class="form-control" name="tot_harga_tran" value="<?php echo $t_harga;?>" readonly>
                                </div>
                                <div class="form-group">
                                	<label>Pembayaran</label>
                                    <input type="number" class="form-control" name="pem_harga_tran" value="<?php echo $pembayaran;?>" readonly>
                                </div>
                                <div class="form-group">
                                	<label>Uang Kembali</label>
                                    <input type="number" class="form-control" name="uang_kem_tran" value="<?php echo $kem_tran;?>" readonly>
                                </div>
                                <input type="submit" class="btn btn-primary btn-lg" value="submit" name="subm_transaksi">
    						</form>
    					</div>
    				</div>
    			</div>
    		</div>
    	</div>
    </div>
</div>