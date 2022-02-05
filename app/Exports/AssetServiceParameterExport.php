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

class AssetServiceParameterExport implements FromCollection, WithHeadings, ShouldAutoSize, WithEvents, WithHeadingRow
{
    protected $fromDates,$toDates;

    function __construct($fromDates,$toDates)
    {
        $this->fromDates = $fromDates;
        $this->toDates = $toDates;
    }
    
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
                $event->sheet->setCellValue('A1', 'Laporan Perbaikan Barang')->mergeCells("A1:H1")->getStyle('A1:H1')->applyFromArray($styleTitle);
                $event->sheet->getStyle('A2:H2')->applyFromArray($styleArray);
                $event->sheet->setCellValue('A2', 'No');
                $event->sheet->setCellValue('B2', 'Nama Asset');
                $event->sheet->setCellValue('C2', 'Unit');
                $event->sheet->setCellValue('D2', 'Nama');
                $event->sheet->setCellValue('E2', 'Deskripsi Masalah');
                $event->sheet->setCellValue('F2', 'Diagnosa Perbaikan');
                $event->sheet->setCellValue('G2', 'Tanggal Mulai');
                $event->sheet->setCellValue('H2', 'Tanggal Selesai');
                foreach (range('A', 'H') as $col) {
                    $event->sheet->getColumnDimension($col)->setAutoSize(true);
                }
                $cell=3;
                $i=1;
                $laporan = UnitLog::getServiceParameter($this->fromDates,$this->toDates);
                foreach ($laporan as $row) {
                    $event->sheet->getStyle('A'.$cell.':'.'H'.$cell)->applyFromArray($styleContent);
                    $event->sheet->setCellValue('A' . $cell, $i);
                    $event->sheet->setCellValue('B' . $cell, $row->asset_name);
                    $event->sheet->setCellValue('C' . $cell, $row->department_name);
                    $event->sheet->setCellValue('D' . $cell, $row->complainant_name);
                    $event->sheet->setCellValue('E' . $cell, $row->desc_complain);
                    $event->sheet->setCellValue('F' . $cell, $row->diagnose);
                    $event->sheet->setCellValue('G' . $cell, Carbon::parse(date($row->created_at))->format('Y-m-d'));
                    $event->sheet->setCellValue('H' . $cell, $row->date_fixed);
                    $cell++;
                    $i++;
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
        return collect(UnitLog::getServiceParameter($this->fromDates,$this->toDates));
    }
}