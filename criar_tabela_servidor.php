<?php

require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
// use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\IOFactory;

$spreadsheet = new Spreadsheet();

$sheet = $spreadsheet->getActiveSheet();

$sheet->setCellValue('A1', '#');
$sheet->setCellValue('B1', 'Nome');
$sheet->setCellValue('C1', 'Sobrenome');
$sheet->setCellValue('D1', 'Rede Social');

$sheet->setCellValue('A2', 1);
$sheet->setCellValue('B2', 'Lucas');
$sheet->setCellValue('C2', 'Magalhães');
$sheet->setCellValue('D2', '@lucaormagalhaes');

$sheet->setCellValue('A3', 2);
$sheet->setCellValue('B3', 'Fulano');
$sheet->setCellValue('C3', 'Silva');
$sheet->setCellValue('D3', '@fsilva');

$sheet->setCellValue('A4', 3);
$sheet->setCellValue('B4', 'Beltrano');
$sheet->setCellValue('C4', 'Pereira');
$sheet->setCellValue('D4', '@bpereira');

$filename = 'exemplo' . time() . '.xlsx';

header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="'.$filename.'"');
header('Cache-Control: max-age=0');
// header('Cache-Control: max-age=1');
// header('Expires: Mon, 23 Apr 2022 06:00:00 GMT');
header('Last-Modified: ' . gmdate('D, d M Y H:i:s') . ' GMT');
header('Cache-Control: cache, must-revalidate');
header('Pragma: public');

$writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
$writer->save('php://output');