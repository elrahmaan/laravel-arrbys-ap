<?php

namespace App\Exports;

use App\Models\UnitLog;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class AssetServiceExport implements FromCollection, WithHeadings, ShouldAutoSize, WithEvents, WithHeadingRow
{
    public function headings(): array
    {
        return [
            'Nama Asset',
            'Unit',
            'Nama',
            'Deskripsi Masalah',
            'Diagnosa Perbaikan',
            'Tanggal Selesai',
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
                'size' => 13
            ],
        ];
        $styleTitle = [
            'font' => [
                'bold' => true,
                'size' => 15
            ],
            'alignment' => [
                'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
            ],
        ];
        $styleContent = [
            'font' => [
                'bold' => false,
                'size' => 12
            ],
            'alignment' => [
                'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_LEFT,
            ],
        ];
        return [
            AfterSheet::class    => function (AfterSheet $event) use ($styleArray, $styleTitle,$styleContent) {
                // $cellRange = 'A1:G1'; // All headers
                $event->sheet->setCellValue('A1', 'Laporan Perbaikan Barang')->mergeCells("A1:F1")->getStyle('A1:F1')->applyFromArray($styleTitle);
                $event->sheet->getStyle('A2:F2')->applyFromArray($styleArray);
                $event->sheet->setCellValue('A2', 'Nama Asset');
                $event->sheet->setCellValue('B2', 'Unit');
                $event->sheet->setCellValue('C2', 'Nama');
                $event->sheet->setCellValue('D2', 'Deskripsi Masalah');
                $event->sheet->setCellValue('E2', 'Diagnosa Perbaikan');
                $event->sheet->setCellValue('F2', 'Tanggal Selesai');
                foreach (range('A', 'F') as $col) {
                    $event->sheet->getColumnDimension($col)->setAutoSize(true);
                }
                $cell=3;
                $laporan = UnitLog::getDataUnit();
                foreach ($laporan as $row) {
                    $event->sheet->getStyle('A'.$cell.':'.'F'.$cell)->applyFromArray($styleContent);
                    $event->sheet->setCellValue('A' . $cell, $row->asset_name);
                    $event->sheet->setCellValue('B' . $cell, $row->department_name);
                    $event->sheet->setCellValue('C' . $cell, $row->complainant_name);
                    $event->sheet->setCellValue('D' . $cell, $row->desc_complain);
                    $event->sheet->setCellValue('E' . $cell, $row->diagnose);
                    $event->sheet->setCellValue('F' . $cell, $row->date_fixed);
                    $cell++;
                }
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
        return collect(UnitLog::getDataUnit());
    }
   
}