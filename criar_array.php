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

// Estilos da Célula A1
$styles = [
    'font' => [
        'bold' => true,
        'color' => [
            'rgb' => 'F00F00'
        ],
        'size' => 25,
        'name' => 'Cambria'
    ]
];

// Define o Estilo da Célula A1
$sheet->getStyle('A1')->applyFromArray($styles);

// Variável Contendo o Array de Dados da Planilha
$cells = [
    ['ID', 'Nome', 'Valor'],
    [1, 'Monitor', 600.00],
    [2, 'Impressora', 900.00],
    [3, 'Nootebook', 2500.00],
    [null, 'Total', '=SUM(C4:C6)']
];

// Define os Valores Dentro da Planilha Utilizando um Array
$sheet->fromArray($cells, null, 'A3');

// Estilos da Célula A1
$styles = [
    'font' => [
        'bold' => true,
        'name' => 'Cambria'
    ]
];

// Aplica os Estilos no Cabeçalho dos Valores
$sheet->getStyle('A3:C3')->applyFromArray($styles);

// Escreve o Arquivo no Disco com o Formato XLSX
$writer = new Xlsx($spreadsheet);

$writer->save('./arquivos/arquivo.xlsx');