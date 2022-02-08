<?php

namespace App\Exports;

use App\Models\Loan;
use App\Models\LoanAsset;
use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithColumnWidths;


// use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class LoanExport implements WithHeadings, WithEvents, WithHeadingRow, WithColumnWidths
{
    public function columnWidths(): array
    {
        return [
            'A' => 3,
            'B' => 6,
            'C' => 6,       
            'E' =>20,
            'H' => 25, 
        ];
    }
    public function headings(): array
    {
        return [
            // 'Nama',
            // 'Unit',
            // 'Disetujui Oleh',
            // 'Nama Barang',
            // 'Kategori Barang Peminjaman',
            // 'Tanggal Peminjaman',
            // 'Tanggal Pengembalian',      
            // 'Status'
        ];
    }
    /**
     * @return array
     */
    public function registerEvents(): array
    {
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
        $center =[
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
        $styleContent = [
            'font' => [
                'bold' => false,
                'size' => 11
            ],
            'alignment' => [
                'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_LEFT,
                'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
            ],
            'borders' => [
                'allBorders' => [
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,

                ],
            ],

        ];
        return [
            AfterSheet::class    => function (AfterSheet $event) use ($styleArray, $styleTitle, $styleContent, $center) {
                $event->sheet->getStyle('A1:A6')->applyFromArray($styleTitle);
                $event->sheet->getStyle('H')->getAlignment()->setWrapText(true);
                $event->sheet->getStyle('E')->getAlignment()->setWrapText(true);
                $event->sheet->setCellValue('A1', 'PT. Angkasa Pura Airports');
                $event->sheet->setCellValue('A2', 'Cabang Bandara Juanda - Surabaya');
                $event->sheet->setCellValue('A4', 'Laporan Peminjaman Barang');
                $event->sheet->setCellValue('A6', 'Tanggal: ');
                $event->sheet->setCellValue('C6', Carbon::now()->isoFormat('DD MMMM YYYY'));
                $event->sheet->setCellValue('F6', 'Periode: ');
                $event->sheet->setCellValue('G6', Carbon::now()->isoFormat('MMMM YYYY'));
                $event->sheet->setCellValue('B9', 'No')->mergeCells("B9:B10")->getStyle('B9:B10')->applyFromArray($styleArray);
                $event->sheet->setCellValue('C9', 'Nama')->mergeCells("C9:D10")->getStyle('C9:D10')->applyFromArray($styleArray);
                $event->sheet->setCellValue('E9', 'Unit')->mergeCells("E9:E10")->getStyle('E9:E10')->applyFromArray($styleArray);
                $event->sheet->setCellValue('F9', 'Disetujui Oleh')->mergeCells("F9:F10")->getStyle('F9:F10')->applyFromArray($styleArray);
                $event->sheet->setCellValue('G9', 'Diterima Oleh')->mergeCells("G9:G10")->getStyle('G9:G10')->applyFromArray($styleArray);
                $event->sheet->setCellValue('H9', 'Nama Asset')->mergeCells("H9:H10")->getStyle('H9:H10')->applyFromArray($styleArray);
                // $event->sheet->setCellValue('E9', 'Kategori Barang Peminjaman');
                // $event->sheet->setCellValue('H9', 'Tanggal Peminjaman')->mergeCells("H9:H10")->getStyle('H9:H10')->applyFromArray($styleArray);
                $event->sheet->setCellValue('I9', 'Tanggal Pengembalian')->mergeCells("I9:I10")->getStyle('I9:I10')->applyFromArray($styleArray);
                // $event->sheet->setCellValue('H2', 'Status');

                foreach (range('D', 'I') as $col) {
                    if($col === 'E'){
                        continue;
                    }
                    if($col==='H'){
                        continue;
                    }
                    $event->sheet->getColumnDimension($col)->setAutoSize(true);
                }
                $cell = 11;
                $i = 1;
                $laporan = Loan::getLoan();
                $loan_date = Loan::getDate();
                // dd($loan_date);
                foreach ($loan_date as $date) {
                    // dd($date->loan_date);

                    $event->sheet->setCellValue('B' . $cell, $i);
                    $event->sheet->setCellValue('C' . $cell, Carbon::parse($date->loan_date)->isoFormat('DD MMMM YYYY'))->mergeCells('C' . $cell . ':I' . $cell);
                    $cell++;
                    $loans = Loan::getLoanPerDate($date->loan_date);
                    $i_data = 1;
                    foreach ($loans as $row) {
                        $cellData = $cell;
                        $loanAssets = Loan::getLoanAsset($row->id);
                        // $event->sheet->setCellValue('B' . $cell, "tes");
                        // $event->sheet->setCellValue('B' . $cellData, $i);
                        
                        $event->sheet->setCellValue('D' . $cellData, $row->name);
                        $event->sheet->setCellValue('E' . $cellData, $row->department_name);
                        $event->sheet->setCellValue('F' . $cellData, $row->approved_by);
                        $event->sheet->setCellValue('G' . $cellData, $row->approved_return);
                        $event->sheet->setCellValue(
                            'H' . $cellData,
                            implode(', ', $loanAssets)
                        );
                        // $event->sheet->setCellValue('H' . $cellData, Carbon::parse(date($row->loan_date))->toFormattedDateString());
                        $event->sheet->setCellValue('I' . $cellData, Carbon::parse($row->real_return_date)->isoFormat('DD MMMM YYYY'));
                        $endRow = $cellData;
                        $event->sheet->getStyle('B' . $cell . ':' . 'I' . $cellData)->applyFromArray($styleContent);
                        $event->sheet->setCellValue('C' . $cellData, $i_data)->getStyle('C'.$cellData)->applyFromArray($center);
                        $cellData++;
                        $cell = $cellData;
                        $i_data++;
                    }
                    $i++;
                }
                // content outside border
                //left
                $event->sheet->getStyle('B11:B' . $endRow)->applyFromArray([
                    'borders' => [
                        'left' => [
                            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK,
                        ],
                        'right' => [
                            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK,
                        ]
                    ],
                    'alignment' => [
                        'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                    ],
                ]);
                //right
                $event->sheet->getStyle('I11:I' . $endRow)->applyFromArray([
                    'borders' => [
                        'right' => [
                            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK,
                        ]
                    ],
                ]);
                //bottom
                $event->sheet->getStyle('B' . $endRow . ':I' . $endRow)->applyFromArray([
                    'borders' => [
                        'bottom' => [
                            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK,
                        ]
                    ],
                ]);
            },
        ];
    }
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        //return Loan::all();
        return collect(Loan::getLoan());
    }
    // public function styles(Worksheet $sheet)
    // {
    //     return [
    //         // Style the first row as bold text.
    //         'A1:W1'    => ['font' => ['bold' => true]],
    //     ];
    // }
}