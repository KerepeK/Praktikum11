<?php
include('koneksi0.php'); // memanggil file koneksi
require 'vendor/autoload.php'; // membutuhkan 
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
// membuat header kolom
$spreadsheet = new Spreadsheet ();
$sheet = $spreadsheet->getActiveSheet();
$sheet->setCellValue('A1','No');
$sheet->setCellValue('B1','Nama');
$sheet->setCellValue('C1','Kelas');
$sheet->setCellValue('D1','Alamat');
// query sql dan mengisi tabel
$query = mysqli_query($koneksi, "select * from tb_siswa");
$i=2; 
$no=1;
while($row = mysqli_fetch_array($query))
{
    $sheet->setCellValue('A'.$i, $no++);
    $sheet->setCellValue('B'.$i, $row['nama']);
    $sheet->setCellValue('C'.$i, $row['kelas']);
    $sheet->setCellValue('D'.$i, $row['alamat']);
    $i++;
}
// membuat garis pinggir
$styleArray = [
    'border'=>[
        'allBorders'=>[
            'borderStyle'=>\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
        ],
    ],
];
$i = $i - 1;
$sheet->getStyle('A1:D' .$i)->applyFromArray($styleArray);
// save file dengan nama...
$writer = new Xlsx($spreadsheet);
$writer->save('Report Data Siswa.xlsx');
?>