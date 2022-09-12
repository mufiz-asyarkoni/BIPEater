<?php
// memanggil library phpspreadsheet
require 'vendor/autoload.php';
 
$reader = \PhpOffice\PhpSpreadsheet\IOFactory::createReader('Xlsx');
$reader->setReadDataOnly(TRUE);
 
// setting nama file yg akan dibaca
$spreadsheet = $reader->load("data.xlsx");
 
// data worksheet yg akan dibaca ada di active sheet
$worksheet = $spreadsheet->getActiveSheet();
 
// mendapatkan maks nomor baris data
$highestRow = $worksheet->getHighestRow();
// mendapatkan maks kolom data
$highestColumn = $worksheet->getHighestColumn();
 
// mendapatkan nama-nama kolom data 
// membaca value yang ada di cell: A1, B1, ..., E1
// dan simpan ke dalam array $colsName
$colsName = array();
for($col='A'; $col<=$highestColumn; $col++){
    $colsName[] =  $worksheet->getCell($col . 1)->getValue();
}
 
// inisialisasi array untuk menampung semua data
$dataAll = array();
 
// proses membaca data baris-perbaris 
// dimulai dari baris ke-2, karena baris ke-1 berisi nama kolom tabel
 
for($row=2; $row<=$highestRow; $row++){
    // inisialisasi array untuk data perbaris
    $dataRow = array();
 
    $i = 0;
    // untuk setiap baris data, baca value tiap kolom cell
        // misal untuk baris ke-2, cell yang dibaca: A2, B2, ..., E2
        // misal untuk baris ke-3, cell yang dibaca: A3, B3, ..., E3
        // dst ...
    for($col='A'; $col<=$highestColumn; $col++){
        // setiap value digabung menjadi satu
        // dan tambahkan ke array $dataRow
        $dataRow += array($colsName[$i] => $worksheet->getCell($col . $row)->getValue());
        $i++;
    }
    // setelah didapat data array perbaris
    // tambahkan ke $dataAll 
    $dataAll[] = $dataRow;
}
 
// convert ke json lalu tampilkan
echo json_encode($dataAll);
 
?>
