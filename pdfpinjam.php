<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Buku</th>
                                            <th>Nama Siswa</th>
                                            <th>Tanggal Pinjam</th>
                                            <th>Tanggal Kembali</th>
                                            <th>status</th>
                                        </tr>
                                    </thead> 
                                    <tbody>
                                        <?php
                                        include "koneksi.php";
                                        $no=1;
                                        $ambildata = mysqli_query($koneksi,"SELECT * FROM pinjam ,buku, siswa WHERE siswa.nisn=pinjam.nisn AND buku.kode_buku=pinjam.kode_buku");
                                        while ($tampil = mysqli_fetch_array($ambildata)){ ?>
                                            
                                            <tr>
                                                <td><?=$no?></td>
                                                <td><?=$tampil['judul']?></td>
                                                <td><?=$tampil['nama']?></td>
                                                <td><?=$tampil['tgl_pinjam']?></td>
                                                <td><?=$tampil['tgl_kembali']?></td>
                                                <td><?php 
                                                    if ($tampil['status']==0) {
                                                        echo "Belom Di Kembalikan";
                                                    }else {
                                                        echo "Sudah Di kembalikan";
                                                    }
                                                    ?></td>
                                                <td>
                                               

                                            </td>
                                           </tr> 
                                        <?php } ?>
                                    
                                    </tbody>
                                </table>

                                <script>
                                    window.print();
                                </script>