<?php

namespace App\Exports;

use App\Models\Loan;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class LoanParameterExport implements FromCollection, WithHeadings, ShouldAutoSize, WithEvents, WithHeadingRow
{
    protected $fromDates, $toDates;

    function __construct($fromDates, $toDates)
    {
        $this->fromDates = $fromDates;
        $this->toDates = $toDates;
    }
    public function collection()
    {
        return collect(Loan::getLoanParameter($this->fromDates, $this->toDates));
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
                $event->sheet->setCellValue('A1', 'Laporan Peminjaman Barang')->mergeCells("A1:G1")->getStyle('A1:G1')->applyFromArray($styleTitle);
                $event->sheet->getStyle('A2:G2')->applyFromArray($styleArray);
                $event->sheet->setCellValue('A2', 'Nama');
                $event->sheet->setCellValue('B2', 'Unit');
                $event->sheet->setCellValue('C2', 'Disetujui Oleh');
                $event->sheet->setCellValue('D2', 'Diterima Oleh');
                $event->sheet->setCellValue('E2', 'Nama Asset');
                // $event->sheet->setCellValue('E2', 'Kategori Barang Peminjaman');
                $event->sheet->setCellValue('F2', 'Tanggal Peminjaman');
                $event->sheet->setCellValue('G2', 'Tanggal Pengembalian');
                // $event->sheet->setCellValue('H2', 'Status');
                foreach (range('A', 'G') as $col) {
                    $event->sheet->getColumnDimension($col)->setAutoSize(true);
                }
                $cell = 3;
                $laporan = Loan::getLoanParameter($this->fromDates, $this->toDates);
                foreach ($laporan as $row) {
                    // fetch loan assets 
                    $loanAssets = Loan::getLoanAsset($row->id);
                    foreach ($loanAssets as $loanAsset) {
                        $assets[] = $loanAsset->name . ' (' . $loanAsset->no_serial . ' | ' .  $loanAsset->category_asset . ')';
                    }
                    $event->sheet->getStyle('A' . $cell . ':' . 'G' . $cell)->applyFromArray($styleContent);
                    $event->sheet->setCellValue('A' . $cell, $row->name);
                    $event->sheet->setCellValue('B' . $cell, $row->department_name);
                    $event->sheet->setCellValue('C' . $cell, $row->approved_by);
                    $event->sheet->setCellValue('D' . $cell, $row->approved_return);
                    $event->sheet->setCellValue(
                        'E' . $cell,
                        implode(', ', $assets)
                    );
                    // $event->sheet->setCellValue('E' . $cell, $row->category_asset);
                    $event->sheet->setCellValue('F' . $cell, $row->loan_date);
                    $event->sheet->setCellValue('G' . $cell, $row->real_return_date);
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
}