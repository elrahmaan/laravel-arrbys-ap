<?php

namespace App\Exports;

use App\Models\Asset;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

// use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class AssetExport implements WithHeadings, ShouldAutoSize, WithEvents, WithHeadingRow
{
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
            AfterSheet::class    => function (AfterSheet $event) use ($styleArray, $styleTitle, $styleContent) {
                // $cellRange = 'A1:G1'; // All headers
                foreach (range('A', 'G') as $col) {
                    $event->sheet->getColumnDimension($col)->setAutoSize(true);
                }
                $event->sheet->setCellValue('A1', 'Laporan Aset')->mergeCells("A1:G1")->getStyle('A1:G1')->applyFromArray($styleTitle);
                $event->sheet->getStyle('A2:G2')->applyFromArray($styleArray);
                $event->sheet->setCellValue('A2', 'No');
                $event->sheet->setCellValue('B2', 'Nama');
                $event->sheet->setCellValue('C2', 'Id Kategori');
                $event->sheet->setCellValue('D2', 'Kategori Aset (Asset / Sewa )');
                $event->sheet->setCellValue('E2', 'Spesifikasi Detail');
                $event->sheet->setCellValue('F2', 'Jumlah');
                $event->sheet->setCellValue('G2', 'Tanggal Masuk');
                
            },
        ];
    }
    /**
     * @return \Illuminate\Support\Collection
     */
    // public function collection()
    // {
    //     //return Loan::all();
    //     return collect(Asset::getData());
    // }
    // public function styles(Worksheet $sheet)
    // {
    //     return [
    //         // Style the first row as bold text.
    //         'A1:W1'    => ['font' => ['bold' => true]],
    //     ];
    // }
}