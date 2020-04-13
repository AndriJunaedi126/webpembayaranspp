
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <strong>Pembayaran</strong>
                            </div>
                            <div class="page-header float-left">
                                <div class="page-title ml-3">
                                    <h1><strong>Operator</strong></h1>
                                </div>
                                <div class="card-body card-block">
                                    <form action="models/Add-pembayaran.php" method="post" enctype="multipart/form-data" class="form-horizontal">
                                        <div class="row form-group">
                                            <div class="col col-md-2">
                                                <strong></strong><label for="id_petugas"
                                                    class=" form-control-label">ID</label></div>
                                            <div class="col-12 col-md-1"><input type="text" id="id_petugas"
                                                    name="id_petugas" placeholder="ID.." class="form-control" value="<?php echo $_SESSION['id_user']  ?>" readonly>
                                            </div>
                                        </div>
                                        <div class="row form-group">
                                            <div class="col col-md-2"><label for="nama_petugas"
                                                    class=" form-control-label">Nama</label></div>
                                            <div class="col-12 col-md-4">
                                                <input type="text" id="nama_petugas" name="nama_petugas"
                                                    placeholder="Nama.." class="form-control" value="<?php echo $_SESSION['username'] ?>" readonly>
                                            </div>
                                        </div>

                                        <div class="page-title">
                                            <h1><strong>Siswa</strong></h1>
                                        </div>
                                        <div class="row form-group">
                                            <div class="col col-md-2">
                                                <strong></strong><label for="id_siswa"
                                                    class=" form-control-label">ID</label></div>
                                            <div class="col-12 col-md-1"><input type="text" id="id_siswa"
                                                    name="id_siswa" placeholder="ID.." class="form-control" value="<?php echo $data['id_siswa'] ?>" readonly>
                                            </div>
                                        </div>
                                        <div class="row form-group">
                                            <div class="col col-md-2">
                                                <strong></strong><label for="nisn"
                                                    class=" form-control-label">NISN</label></div>
                                            <div class="col-12 col-md-2"><input type="text" id="nisn" name="nisn"
                                                    placeholder="Nisn.." class="form-control" value="<?php echo $data['nisn'] ?>" readonly>
                                            </div>
                                        </div>
                                        <div class="row form-group">
                                            <div class="col col-md-2"><label for="nama_siswa"
                                                    class=" form-control-label">Nama</label></div>
                                            <div class="col-12 col-md-4">
                                                <input type="text" id="nama_siswa" name="nama_siswa"
                                                    placeholder="Nama.." class="form-control" value="<?php echo $data[nama_lengkap] ?>" readonly>
                                            </div>
                                        </div>
                                        <div class="page-title">
                                            <h1><strong>SPP</strong></h1>
                                        </div>
                                        <div class="row form-group">
                                            <div class="col col-md-2">
                                                <strong></strong><label for="spp"
                                                    class=" form-control-label">SPP</label></div>
                                            <div class="col-12 col-md-3">
                                                <select name="spp" id="spp" class="form-control" onchange="tampilnominal()" required>
                                                    <option value=" ">Pilih Bulan..</option>
                                                    <?php
                                                        $sql = "select * from spp";
                                                        $query = mysqli_query($koneksi, $sql);
                                                        while($data = mysqli_fetch_array($query)){
                                                        echo "<option value='$data[id_spp]' nominal='$data[nominal]'>$data[bulan] - $data[tahun]</option>";
                                                        }
                                                        ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row form-group">
                                            <div class="col col-md-2">
                                                <strong></strong><label for="nominal"
                                                    class=" form-control-label">Nominal</label></div>
                                            <div class="col-12 col-md-4"><input type="text" id="nominal" name="nominal"
                                                    placeholder="Nominal.." class="form-control" readonly>
                                            </div>
                                        </div>
                                        <div class="row form-group">
                                            <div class="col col-md-2">
                                                <strong></strong><label for="bayar" class=" form-control-label">Nominal
                                                    Bayar</label></div>
                                            <div class="col-12 col-md-4"><input type="tel" id="nominal_bayar" name="nominal_bayar"
                                                placeholder="Nominal bayar.." class="form-control" minlength="5"
                                                onkeypress="return Angka(event)" maxlength="15" required><small
                                                class="form-text text-muted">Nominal bayar harus sama dengan nominal SPP</small>
                                            </div>
                                        </div>

                                        <div class="col col-md-2">

                                        </div>
                                        <div class="col col-md-9">
                                            <button type="submit" class="btn btn-success btn-sm">
                                                <i class="fa fa-dot-circle-o"></i>Bayar
                                            </button>
                                            <button type="reset" class="btn btn-danger btn-sm">
                                                <i class="fa fa-ban"></i> Reset
                                            </button>
                                        </div>
                                    </form>

                                </div>
                            </div>
                            <div class="card-footer mt-5">
                            </div>
                        </div>



                    </div>