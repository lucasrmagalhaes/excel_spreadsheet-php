<?php

// Autoload do Composer
require __DIR__ . '/vendor/autoload.php';

// Dependências do Projeto
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

// Instância Principal da Planilha
$spreadsheet = new Spreadsheet();

// Obtém a Aba Ativa Dentro do Arquivo Excel
$sheet = $spreadsheet->getActiveSheet();

// Define o Conteúdo da Célula A1 (Título do Arquivo)
$sheet->setCellValue('A1', 'XLSX com PHP');

// Cabeçalhos
$sheet->setCellValue('A3', 'ID');
$sheet->setCellValue('B3', 'Nome');
$sheet->setCellValue('C3', 'Valor');

// Valores - Primeira Linha
$sheet->setCellValue('A4', '1');
$sheet->setCellValue('B4', 'Monitor');
$sheet->setCellValue('C4', '600.00');

// Valores - Segunda Linha
$sheet->setCellValue('A5', '2');
$sheet->setCellValue('B5', 'Impressora');
$sheet->setCellValue('C5', '900.00');

// Escreve o Arquivo no Disco com o Formato XLSX
$writer = new Xlsx($spreadsheet);

$writer->save('./arquivos/arquivo.xlsx');