<?php
include "koneksi.php";
require('vendor/autoload.php');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

    $spreadsheet = new Spreadsheet;

    $sql = mysqli_query($koneksi,"SELECT * FROM pinjam ,buku, siswa WHERE siswa.nisn=pinjam.nisn AND buku.kode_buku=pinjam.kode_buku");

    $spreadsheet->setActiveSheetIndex(0)
                                                    ->setCellValue('A1', 'No')
                                                    ->setCellValue('B1', 'Nama Buku')
                                                    ->setCellValue('C1', 'Nama Siswa')
                                                    ->setCellValue('D1', 'Tanggal Pinjam')
                                                    ->setCellValue('E1', 'Tanggal Kembali')
                                                    ->setCellValue('F1', 'Status');

    $kolom = 2;
    $nomor = 1;
    $stat = '';
    foreach($sql as $d) {

                            $stat = '';
                            if($d['status'] == 0)
                            {
                                $stat = "Belum Di Kembalikan";
                            }
                            else
                            {
                                $stat = "Sudah Di Kembalikan";
                            }

                            $spreadsheet->setActiveSheetIndex(0)
                                        ->setCellValue('A' . $kolom, $nomor)
                                        ->setCellValue('B' . $kolom, $d['judul'])
                                        ->setCellValue('C' . $kolom, $d['nama'])
                                        ->setCellValue('D' . $kolom, date('d F Y',strtotime($d['tgl_pinjam'])))
                                        ->setCellValue('E' . $kolom, date('d F Y',strtotime($d['tgl_kembali'])))
                                        ->setCellValue('F' . $kolom, $stat);

                            $kolom++;
                            $nomor++;

    }

    $writer = new Xlsx($spreadsheet);

    ob_end_clean();

    header('Content-Type: application/vnd.ms-excel');
    header('Content-Disposition: attachment;filename="Laporan_Peminjaman'.date('Y-m-d hh:mm:ss').'".xlsx"');
    header('Cache-Control: max-age=0');

    $writer->save('php://output');