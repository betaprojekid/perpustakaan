<?php
$styleArray = [
  'font' => [
      'bold' => true,
  ],
  'alignment' => [
      'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
  ],
  'borders' => [
      'outline' => [
          'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
      ],
  ],
  'fill' => [
      'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_GRADIENT_LINEAR,
      'rotation' => 90,
      'startColor' => [
          'argb' => 'FFA0A0A0',
      ],
      'endColor' => [
          'argb' => 'FFFFFFFF',
      ],
  ],
];