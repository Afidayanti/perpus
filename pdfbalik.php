
                                 <table class="table table-bordered" >
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Buku</th>
                                            <th>Nama Siswa</th>
                                            <th>Tanggal Kembali</th>
                                            <th>Tanggal Di Kembalikan</th>
                                            <th>Terlambat Bayar</th>
                                            <th>Denda</th>
                                            <th>status</th>
                                        </tr>
                                    </thead> 
                                    <tbody>
                                        <?php
                                        include "koneksi.php";
                                        $no=1;
                                        $ambildata = mysqli_query($koneksi,"SELECT * FROM pinjam ,buku, siswa WHERE siswa.nisn=pinjam.nisn AND buku.kode_buku=pinjam.kode_buku OR CURDATE() > tgl_kembali");
                                        while ($tampil = mysqli_fetch_array($ambildata)){ ?>
                                            
                                            <tr>
                                                <td><?=$no?></td>
                                                <td><?=$tampil['judul']?></td>
                                                <td><?=$tampil['nama']?></td>
                                                <td><?=$tampil['tgl_kembali']?></td>
                                                <td><?=$tampil['tgl_dikembalikan']?></td>
                                                <?php 
                                                // Menghitung terlambat bayar
                                                // hanya menampilkan data yang terlambat
                                                // $q = $koneksi->query("SELECT * FROM pinjam WHERE CURDATE() > tgl_kembali");
                                            
                                                // $no = 1;
                                                // while($r = $q->fetch_assoc()) { 
                                                $t = date_create($tampil['tgl_dikembalikan']);
                                                $n = date_create($tampil['tgl_kembali']);
                                                $terlambat = date_diff($t, $n);
                                                $hari = $terlambat->format("%a");
                                            // menghitung denda
                                                $denda = $hari * 1000;
                                                
 
                                                ?>
                                                <td><?php 
                                                    if ($tampil['status']==0) {
                                                        echo "0";
                                                    }else {
                                                        echo $hari;
                                                    }
                                                    ?></td>
                                                <td><?php 
                                                    if ($tampil['status']==0) {
                                                        echo "0";
                                                    }else {
                                                        echo $denda;
                                                    }
                                                    ?></td>
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