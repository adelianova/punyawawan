        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-success">
                        <div class="panel-heading">
                            Join
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>NIK Pengunjung</th>
                                            <th>Nama</th>
                                            <th>No Kartu</th>
                                            <th>Faskes T1</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $no = 1;
                                        foreach ($join as $pengunjung) {
                                            # code...
                                        ?>
                                        <tr>
                                            <td><?php echo $no;?></td>
                                            <td><?php echo $pengunjung->nik_pengunjung;?></td>
                                            <td><?php echo $pengunjung->nama_pengunjung;?></td>
                                            <td><?php echo $pengunjung->no_kartu;?></td>
                                            <td><?php echo $pengunjung->faskes_t1;?></td>
                                        </tr>
                                        <?php
                                        $no++;
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