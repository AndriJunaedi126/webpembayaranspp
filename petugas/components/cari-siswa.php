
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">Cari Siswa</strong>
                            </div>
                            <div class="card-body">
                                <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>NISN</th>
                                            <th>NIS</th>
                                            <th>Nama</th>
                                            <th>Kelas</th>
                                            <th>Kompetensi Keahlian</th>
                                            <th>Opsi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                        $sql = "SELECT siswa.id_siswa,nisn,nis,nama_lengkap,nama_kelas,komp_keahlian FROM siswa INNER JOIN kelas ON siswa.id_kelas = kelas.id_kelas";
                                        $query = mysqli_query($koneksi, $sql);
                                        while($data = mysqli_fetch_array($query)){
                                            echo "<tr>
                                            <td>$data[id_siswa]</td>
                                            <td>$data[nisn]</td>
                                            <td>$data[nis]</td>
                                            <td>$data[nama_lengkap]</td>
                                            <td>$data[nama_kelas]</td>
                                            <td>$data[komp_keahlian]</td>
                                            <td>
                                                <div class='dropdown float-right'>
                                                    <button class='btn bg-transparent dropdown-toggle theme-toggle text-dark'
                                                    type='button' id='opsi-siswa' data-toggle='dropdown'>
                                                    <i class='fa fa-cog'></i></button>
                                                    <div class='dropdown-menu' aria-labelledby='opsi-siswa'>
                                                        <div class='dropdown-menu-content'>
                                                            <a class='dropdown-item text-success'
                                                            href='pembayaran.php?id=$data[id_siswa]'>Pilih</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                          </tr>";
                                        }
                                    ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>