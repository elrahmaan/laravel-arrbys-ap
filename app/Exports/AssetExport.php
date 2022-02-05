<?php

namespace App\Exports;

use App\Models\Asset;
use App\Models\AssetCategory;
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

                //1
                // foreach ($categories as $cat) {
                //     $event->sheet->setCellValue('A' . $cell, $cat->id);
                //     $event->sheet->setCellValue('B' . $cell, $cat->name);
                //     $cell++;
                //     $content = $cell;
                // }
                // $event->sheet->getStyle('A' . $content . ':' . 'G' . $content)->applyFromArray($styleArray);
                // $event->sheet->setCellValue('A' . $content, 'No');
                // $event->sheet->setCellValue('B' . $content, 'Nama');
                // $event->sheet->setCellValue('C' . $content, 'Kategori');
                // $event->sheet->setCellValue('D' . $content, 'Kategori Aset');
                // $event->sheet->setCellValue('E' . $content, 'Deskripsi');
                // $event->sheet->setCellValue('F' . $content, 'Jumlah');
                // $event->sheet->setCellValue('G' . $content, 'Tanggal Masuk');

                // 2
                $event->sheet->setCellValue('A1', 'Impor Data Aset')->mergeCells("A1:G1")->getStyle('A1:G1')->applyFromArray($styleTitle);
                $event->sheet->getStyle('A2:G2')->applyFromArray($styleArray);
                $event->sheet->setCellValue('A2', 'No');
                $event->sheet->setCellValue('B2', 'Nama');
                $event->sheet->setCellValue('C2', 'Kategori');
                $event->sheet->setCellValue('D2', 'Kategori Aset');
                $event->sheet->setCellValue('E2', 'Deskripsi');
                $event->sheet->setCellValue('F2', 'Jumlah');
                $event->sheet->setCellValue('G2', 'Tanggal Masuk');

                //3
                // $event->sheet->setCellValue('A1', 'Impor Data Aset')->mergeCells("A1:G1")->getStyle('A1:G1')->applyFromArray($styleTitle);
                // $event->sheet->setCellValue('B2', 'Kategori Asset:');
                // $event->sheet->setCellValue('B3', '1. Asset AP');
                // $event->sheet->setCellValue('B4', '2. Sewa');
                // $event->sheet->getStyle('A6:G6')->applyFromArray($styleArray);
                // $event->sheet->setCellValue('A6', 'No');
                // $event->sheet->setCellValue('B6', 'Nama');
                // $event->sheet->setCellValue('C6', 'Kategori');
                // $event->sheet->setCellValue('D6', 'Kategori Aset');
                // $event->sheet->setCellValue('E6', 'Deskripsi');
                // $event->sheet->setCellValue('F6', 'Jumlah');
                // $event->sheet->setCellValue('G6', 'Tanggal Masuk');


                //keterangan kategori
                // $event->sheet->setCellValue('J3', 'Kode Kategori:');
                // $categories = AssetCategory::all();
                // $cell = 4;
                // foreach($categories as $cat){
                //     $event->sheet->setCellValue('J' . $cell, $cat->id);
                //     $event->sheet->setCellValue('K' . $cell, $cat->name);
                //     $cell++;
                // }

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
