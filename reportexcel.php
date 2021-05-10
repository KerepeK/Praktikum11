<?php 
include('koneksi.php');
require 'vendor/autoload.php';
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

$spreadsheet = new Spreadsheet();
$sheet = $spreadsheet->getActiveSheet();
$sheet->setCellValue('A1','No');
$sheet->setCellValue('B1','Jenis Pendaftaran');
$sheet->setCellValue('C1','Tanggal Masuk');
$sheet->setCellValue('D1','NIS');
$sheet->setCellValue('E1','Nomor ujian');
$sheet->setCellValue('F1','Paud');
$sheet->setCellValue('G1','TK');
$sheet->setCellValue('H1','SKHUN Lama');
$sheet->setCellValue('I1','Ijazah Lama');
$sheet->setCellValue('J1','Hobi');
$sheet->setCellValue('K1','Cita-cita');
$sheet->setCellValue('L1','Nama Lengkap');
$sheet->setCellValue('M1','Jenis Kelamin');
$sheet->setCellValue('N1','NISN');
$sheet->setCellValue('O1','NIK');
$sheet->setCellValue('P1','Tempat Lahir');
$sheet->setCellValue('Q1','Tanggal Lahir');
$sheet->setCellValue('R1','Agama');
$sheet->setCellValue('S1','Berkebutuhan Khusus');
$sheet->setCellValue('T1','Alamat Jalan');
$sheet->setCellValue('U1','RT');
$sheet->setCellValue('V1','RW');
$sheet->setCellValue('W1','Nama Dusun');
$sheet->setCellValue('X1','Nama Kelurahan/Desa');
$sheet->setCellValue('Y1','Kecamatan');
$sheet->setCellValue('Z1','Kode Pos');
$sheet->setCellValue('AB1','Tempat Tinggal');
$sheet->setCellValue('AC1','Mode Transportasi');
$sheet->setCellValue('AD1','Nomor HP');
$sheet->setCellValue('AE1','Email Pribadi');
$sheet->setCellValue('AF1','Penerima KPS/PKH/KIP');
$sheet->setCellValue('AG1','No. KPS/PKH/KIP');
$sheet->setCellValue('AH1','Kewarganegaraan');
$sheet->setCellValue('AI1','Negara');

$query = mysqli_query($koneksi, "select * from pendaftaran");
$i = 2;
$no = 1;
while($row = mysqli_fetch_array($query))
{
	$sheet->setCellValue('A'.$i,$no++);
	$sheet->setCellValue('B'.$i,$row['jenis_pendaftaran']);
	$sheet->setCellValue('C'.$i,$row['tgl_msk']);
	$sheet->setCellValue('D'.$i,$row['nis']);
	$sheet->setCellValue('E'.$i,$row['no_ujian']);
	$sheet->setCellValue('F'.$i,$row['paud']);
	$sheet->setCellValue('G'.$i,$row['tk']);
	$sheet->setCellValue('H'.$i,$row['skhun']);
	$sheet->setCellValue('I'.$i,$row['ijazah']);
	$sheet->setCellValue('J'.$i,$row['hobi']);
	$sheet->setCellValue('K'.$i,$row['cita2']);
	$sheet->setCellValue('L'.$i,$row['nama']);
	$sheet->setCellValue('M'.$i,$row['jenis_kelamin']);
	$sheet->setCellValue('N'.$i,$row['nisn']);
	$sheet->setCellValue('O'.$i,$row['nik']);
	$sheet->setCellValue('P'.$i,$row['tmpt_lahir']);
	$sheet->setCellValue('R'.$i,$row['tgl_lahir']);
	$sheet->setCellValue('S'.$i,$row['agama']);
	$sheet->setCellValue('T'.$i,$row['berkebutuhan']);
	$sheet->setCellValue('U'.$i,$row['alamat']);
	$sheet->setCellValue('V'.$i,$row['rt']);
	$sheet->setCellValue('W'.$i,$row['rw']);
	$sheet->setCellValue('X'.$i,$row['dusun']);
	$sheet->setCellValue('Y'.$i,$row['kelurahan']);
	$sheet->setCellValue('Z'.$i,$row['kecamatan']);
	$sheet->setCellValue('AA'.$i,$row['k_pos']);
	$sheet->setCellValue('AB'.$i,$row['tmpt_tinggal']);
	$sheet->setCellValue('AC'.$i,$row['transportasi']);
	$sheet->setCellValue('AD'.$i,$row['no_hp']);
	$sheet->setCellValue('AE'.$i,$row['email']);
	$sheet->setCellValue('AF'.$i,$row['kps']);
	$sheet->setCellValue('AG'.$i,$row['no_kps']);
	$sheet->setCellValue('AH'.$i,$row['kwn']);
	$sheet->setCellValue('AI'.$i,$row['negara']);
	$i++;
}

$styleArray = [
	'borders' => [
		'allBorders' => [
			'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
		],
	],
];
var_dump($i);
$i = $i - 1;
$sheet->getStyle('A1:AI'.$i)->applyFromArray($styleArray);

$writer = new Xlsx($spreadsheet);
$writer->save('pendaftaran.xlsx');
 ?>
 <!DOCTYPE html>
 <html>
 <head>
 	<title>Export to Excel</title>	
 </head>
 <body>
 <center>
 	<h1>Berhasil Export ke Excel</h1>
 </center>
 </body>
 </html>