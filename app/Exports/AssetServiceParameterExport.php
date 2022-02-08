<?php

namespace App\Exports;

use App\Models\UnitLog;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\WithColumnWidths;

class AssetServiceParameterExport implements WithHeadings, ShouldAutoSize, WithEvents, WithHeadingRow, WithColumnWidths
{
    protected $fromDates, $toDates;

    function __construct($fromDates, $toDates)
    {
        $this->fromDates = $fromDates;
        $this->toDates = $toDates;
    }
    public function columnWidths(): array
    {
        return [
            'A' => 3,
            'B' => 6,
            'C' => 5,
            'E' => 30,
            'G' => 25,
            'H' => 25,
        ];
    }

    public function headings(): array
    {
        return [
            // 'Nama Asset',
            // 'Unit',
            // 'Nama',
            // 'Deskripsi Masalah',
            // 'Diagnosa Perbaikan',
            // 'Tanggal Selesai',
        ];
    }
    /**
     * @return array
     */
    public function registerEvents(): array
    {
        $center = [
            'alignment' => [
                'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
            ],
        ];
        $styleArray = [
            'font' => [
                'bold' => true,
                'size' => 12
            ],
            'borders' => [
                'allBorders' => [
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK,

                ],
            ],
            'alignment' => [
                'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
            ],
        ];
        $styleTitle = [
            'font' => [
                'bold' => true,
                'size' => 12
            ],
        ];
        $styleTitleDate = [
            'font' => [
                'bold' => true,
                'size' => 11
            ],
        ];
        $styleContent = [
            'font' => [
                'bold' => false,
                'size' => 11
            ],
            'alignment' => [
                'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_JUSTIFY,
                'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
            ],
            'borders' => [
                'allBorders' => [
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,

                ],
            ],

        ];
        return [
            AfterSheet::class    => function (AfterSheet $event) use ($center, $styleArray, $styleTitle, $styleTitleDate, $styleContent) {
                $event->sheet->getDelegate()->getRowDimension('10')->setRowHeight(27);
                $event->sheet->getStyle('A1:A4')->applyFromArray($styleTitle);
                $event->sheet->getStyle('E')->getAlignment()->setWrapText(true);
                $event->sheet->getStyle('G')->getAlignment()->setWrapText(true);
                $event->sheet->getStyle('H')->getAlignment()->setWrapText(true);
                $event->sheet->setCellValue('A1', 'PT. Angkasa Pura Airports');
                $event->sheet->setCellValue('A2', 'Cabang Bandara Juanda - Surabaya');
                $event->sheet->setCellValue('A4', 'Laporan Perbaikan Asset');
                $event->sheet->setCellValue('A6', 'Tanggal: ');
                $event->sheet->setCellValue('C6', Carbon::now()->isoFormat('DD MMMM YYYY'))->getStyle('C6')->applyFromArray($styleTitleDate);
                $event->sheet->setCellValue('I5', 'Periode: ');
                $event->sheet->setCellValue('I6', Carbon::parse($this->fromDates)->isoFormat('DD MMMM YYYY') . ' - ' . Carbon::parse($this->toDates)->isoFormat('DD MMMM YYYY'))->getStyle('I6')->applyFromArray($styleTitleDate)->getAlignment()->setWrapText(false);

                $event->sheet->setCellValue('B9', 'No')->mergeCells("B9:B10")->getStyle('B9:B10')->applyFromArray($styleArray);
                $event->sheet->setCellValue('C9', 'Nama Asset')->mergeCells("C9:D10")->getStyle('C9:D10')->applyFromArray($styleArray);
                $event->sheet->setCellValue('E9', 'Pengadu')->mergeCells("E9:F9")->getStyle('E9:F9')->applyFromArray($styleArray, $center);
                $event->sheet->setCellValue('E10', 'Unit')->getStyle('E10')->applyFromArray($styleArray);
                $event->sheet->setCellValue('F10', 'Nama')->getStyle('F10')->applyFromArray($styleArray);

                $event->sheet->setCellValue('G9', 'Perbaikan')->mergeCells("G9:H9")->getStyle('G9:H9')->applyFromArray($styleArray, $center);
                $event->sheet->setCellValue('G10', 'Deskripsi Masalah')->getStyle('G10')->applyFromArray($styleArray);
                $event->sheet->setCellValue('H10', 'Diagnosa Perbaikan')->getStyle('H10')->applyFromArray($styleArray);

                $event->sheet->setCellValue('I9', 'Tanggal')->mergeCells("I9:J9")->getStyle('I9:J9')->applyFromArray($styleArray, $center);
                $event->sheet->setCellValue('I10', 'Tanggal Komplain')->getStyle('I10')->applyFromArray($styleArray);
                $event->sheet->setCellValue('J10', 'Tanggal Selesai')->getStyle('J10')->applyFromArray($styleArray);

                foreach (range('D', 'J') as $col) {
                    if ($col === 'E') {
                        continue;
                    }
                    if ($col === 'G') {
                        continue;
                    }
                    if ($col === 'H') {
                        continue;
                    }
                    $event->sheet->getColumnDimension($col)->setAutoSize(true);
                }
                $cell = 11;
                $i = 1;
                $service_date = UnitLog::getDateParameter($this->fromDates, $this->toDates);
                foreach ($service_date as $date) {
                    $event->sheet->setCellValue('B' . $cell, $i . '. ');
                    $event->sheet->setCellValue('C' . $cell, Carbon::parse($date->date_fixed)->isoFormat('DD MMMM YYYY'))->mergeCells('C' . $cell . ':J' . $cell);
                    $cell++;
                    $services = UnitLog::getLogPerDate($date->date_fixed);
                    $i_data = 1;
                    foreach ($services as $row) {
                        $cellData = $cell;
                        $event->sheet->getStyle('B' . $cell . ':' . 'J' . $cellData)->applyFromArray($styleContent);
                        $event->sheet->setCellValue('C' . $cellData, $i_data . '. ')->getStyle('C' . $cellData)->applyFromArray($center);
                        $event->sheet->setCellValue('D' . $cellData, $row->asset_name);
                        $event->sheet->setCellValue('E' . $cellData, $row->department_name)->getStyle('E' . $cellData)->applyFromArray($center);
                        $event->sheet->setCellValue('F' . $cellData, $row->complainant_name);
                        $event->sheet->setCellValue('G' . $cellData, $row->desc_complain);
                        $event->sheet->setCellValue('H' . $cellData, $row->diagnose);
                        $event->sheet->setCellValue('I' . $cellData, Carbon::parse($row->date)->isoFormat('DD MMMM YYYY'))->getStyle('I' . $cellData)->applyFromArray($center);
                        $event->sheet->setCellValue('J' . $cellData, Carbon::parse($row->date_fixed)->isoFormat('DD MMMM YYYY'))->getStyle('J' . $cellData)->applyFromArray($center);
                        $endRow = $cellData;

                        // $event->sheet->setCellValue('C' . $cellData, $i_data);
                        $cellData++;
                        $cell = $cellData;
                        $i_data++;
                    }
                    $i++;
                }

                // --------content outside border-----------
                // left
                $event->sheet->getStyle('B11:B' . $endRow)->applyFromArray([
                    'borders' => [
                        'left' => [
                            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK,
                        ],
                        'right' => [
                            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                        ]
                    ],
                    'alignment' => [
                        'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                    ],
                ]);
                //right
                $event->sheet->getStyle('J11:J' . $endRow)->applyFromArray([
                    'borders' => [
                        'right' => [
                            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK,
                        ]
                    ],
                ]);
                //bottom
                $event->sheet->getStyle('B' . $endRow . ':J' . $endRow)->applyFromArray([
                    'borders' => [
                        'bottom' => [
                            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK,
                        ]
                    ],
                ]);

                // $laporan = UnitLog::getDateParameter($this->fromDates,$this->toDates);
                // foreach ($laporan as $row) {
                //     $event->sheet->getStyle('A'.$cell.':'.'H'.$cell)->applyFromArray($styleContent);
                //     $event->sheet->setCellValue('A' . $cell, $i);
                //     $event->sheet->setCellValue('B' . $cell, $row->asset_name);
                //     $event->sheet->setCellValue('C' . $cell, $row->department_name);
                //     $event->sheet->setCellValue('D' . $cell, $row->complainant_name);
                //     $event->sheet->setCellValue('E' . $cell, $row->desc_complain);
                //     $event->sheet->setCellValue('F' . $cell, $row->diagnose);
                //     $event->sheet->setCellValue('G' . $cell, Carbon::parse(date($row->created_at))->toFormattedDateString());
                //     $event->sheet->setCellValue('H' . $cell, Carbon::parse(date($row->date_fixed))->toFormattedDateString());
                //     $cell++;
                //     $i++;
                // }
                // $event->sheet->getDelegate()->getStyle($cellRange)->getFont()->setSize(14);
                // $event->sheet->getStyle($cellRange)->ApplyFromArray($styleArray);
            },
        ];
    }
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        //return Loan::all();
        return collect(UnitLog::getServiceParameter($this->fromDates, $this->toDates));
    }
}
