<?php

namespace App\Exports;

use App\Models\Cctv;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\BeforeSheet;
use Maatwebsite\Excel\Concerns\WithDrawings;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;


use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Style\Border;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use PhpOffice\PhpSpreadsheet\Style\Font;
use PhpOffice\PhpSpreadsheet\Worksheet\Drawing;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;

class CctvsExport_copy implements FromCollection,WithColumnFormatting, WithDrawings ,WithStyles ,WithEvents ,WithHeadings
{
    protected $request;
    public function columnFormats(): array
    {
        return [
            'A' => NumberFormat::FORMAT_TEXT,
            'B' => NumberFormat::FORMAT_TEXT,
            'C' => NumberFormat::FORMAT_TEXT,
            'D' => NumberFormat::FORMAT_TEXT,
            'E' => NumberFormat::FORMAT_TEXT,
            'F' => NumberFormat::FORMAT_TEXT,
        ];
    }
    
    public function drawings()
    {
        $drawing = new Drawing();
    $drawing->setName('Company Logo');
    $drawing->setDescription('Company Logo');
    $drawing->setPath(public_path('img/logo.svg'));
    $drawing->setHeight(90);
    $drawing->setCoordinates('A1');

        return [$drawing];
    }
    public function styles(Worksheet $sheet)
    {
        // Set style for the header row
        $sheet->getStyle('A8:F8')->applyFromArray([
            'font' => [
                'bold' => true,
            ],
            'alignment' => [
                'horizontal' => Alignment::HORIZONTAL_CENTER,
                'vertical' => Alignment::VERTICAL_CENTER,
            ],
            'fill' => [
                'fillType' => Fill::FILL_SOLID,
                'startColor' => ['argb' => 'FFCCCCCC'],
            ],
        ]);

        // Set borders for all cells
        $sheet->getStyle('A8:F' . $sheet->getHighestRow())->applyFromArray([
            'borders' => [
                'allBorders' => [
                    'borderStyle' => Border::BORDER_THIN,
                    'color' => ['argb' => 'FF000000'],
                ],
            ],
        ]);

        // Adjust column width
        foreach (range('A', 'F') as $columnID) {
            $sheet->getColumnDimension($columnID)->setWidth(20);
        }

        // Style for merged cells
        $sheet->mergeCells('A1:F1');
        $sheet->mergeCells('A2:A4');
        $sheet->mergeCells('D1:F1');
        $sheet->mergeCells('D2:F2');
        $sheet->mergeCells('D3:F3');
        $sheet->mergeCells('D4:F4');
        $sheet->mergeCells('A5:F5');

        $sheet->getStyle('A1:F5')->applyFromArray([
            'font' => [
                'bold' => true,
                'size' => 12,
            ],
            'alignment' => [
                'horizontal' => Alignment::HORIZONTAL_CENTER,
                'vertical' => Alignment::VERTICAL_CENTER,
            ],
        ]);

        $sheet->getStyle('A5')->applyFromArray([
            'font' => [
                'size' => 20,
                'bold' => true,
            ],
            'alignment' => [
                'horizontal' => Alignment::HORIZONTAL_CENTER,
                'vertical' => Alignment::VERTICAL_CENTER,
            ],
        ]);

        return [];
    }
    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function collection()
    {
        $query = Cctv::query();

        // Terapkan filter yang sama seperti di controller index
        if ($this->request->filled('fv_divisi')) {
            $query->where('fv_divisi', $this->request->input('fv_divisi'));
        }
        if ($this->request->filled('fv_principle')) {
            $query->where('fv_principle', $this->request->input('fv_principle'));
        }
        if ($this->request->filled('fv_sys_type')) {
            $query->where('fv_sys_type', $this->request->input('fv_sys_type'));
        }
        if ($this->request->filled('fv_branch_Name')) {
            $query->where('fv_branch_Name', $this->request->input('fv_branch_Name'));
        }
        if ($this->request->filled('fc_region')) {
            $query->where('fc_region', $this->request->input('fc_region'));
        }
        if ($this->request->filled('fc_status')) {
            $query->where('fc_status', $this->request->input('fc_status'));
        }

        return $query->select('fc_id_cctv', 'fv_divisi', 'fv_sys_type', 'fv_principle', 'fv_branch_Name', 'fc_status')->get();
    }

    public function headings(): array
    {
        return [
            'ID CCTV', 'Division', 'System Type', 'Principle', 'Branch Name', 'Status'
        ];
    }

    

    
    
    
    public function registerEvents(): array
    {
        return [
            BeforeSheet::class => function (BeforeSheet $event) {
                $sheet = $event->sheet->getDelegate();

                // Adding the company logo
                
                // $drawing->setWorksheet($sheet);

                // Add company information
                $sheet->setCellValue('A1', 'Jl. Sunandar Priyo Sudarmo No. 45 (Ruko No.45 G/H/I)');
                $sheet->setCellValue('A2', 'Blimbing Malang, Jawa Timur - Indonesia 65126');
                $sheet->setCellValue('A3', 'contact@rms.co.id');
                $sheet->setCellValue('D1', 'PT RUKUN MITRA SEJATI');

                // Add report title and metadata
                $sheet->setCellValue('A5', 'Internal Report');
                $sheet->setCellValue('A6', 'No: 001/IT/Support/VII/2024');
                $sheet->setCellValue('A7', 'Date: ' . date('d F Y'));
                $sheet->setCellValue('D6', 'To: Head Of IT Division, Regional Manager');
                $sheet->setCellValue('D7', 'From: IT Support Division');
                $sheet->setCellValue('D8', 'Subject: Laporan Status CCTV');
            },
        ];
    }

    
}