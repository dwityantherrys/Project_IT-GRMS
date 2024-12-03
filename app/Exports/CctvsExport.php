<?php
namespace App\Exports;

use App\Models\Cctv;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithColumnWidths;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithDrawings;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use PhpOffice\PhpSpreadsheet\Worksheet\Drawing;
use Maatwebsite\Excel\Concerns\WithCustomStartCell;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;

class CctvsExport implements FromCollection, WithDrawings, WithHeadings, WithCustomStartCell, WithColumnWidths, WithStyles, WithEvents
{
    protected $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function startCell(): string
    {
        return 'A3';
    }

    public function drawings()
    {
        $drawing = new Drawing();
        $drawing->setName('Logo');
        $drawing->setDescription('This is my logo');
        $drawing->setPath(public_path('img/logo.png'));
        $drawing->setHeight(40);
        $drawing->setCoordinates('A1');
        $drawing->setOffsetX(15);
        $drawing->setOffsetY(12);

        return [$drawing];
    }

    public function columnWidths(): array
    {
        return [
            'B' => 30,
            'C' => 30,
            'D' => 30,
            'E' => 30,
            'F' => 20,
            'G' => 40,
            
        ];
    }

    public function headings(): array
    {
        return [
            'ID CCTV', 'Division', 'System Type', 'Principle', 'Branch Name', 'Status','Error Deskripsi'
        ];
    }

    public function collection()
{
    $query = Cctv::query();

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

    // Ambil data dan ubah nilai fc_status
    $data = $query->select('fc_id_cctv', 'fv_divisi', 'fv_sys_type', 'fv_principle', 'fv_branch_Name', 'fc_status','fv_ket_error')->get();

    // Map data untuk mengubah nilai status
    $data = $data->map(function($item) {
        switch ($item->fc_status) {
            case 'A':
                $item->fc_status = 'Normal';
                break;
            case 'E':
                $item->fc_status = 'Error';
                break;
            case 'C':
                $item->fc_status = 'Closed';
                break;
        }
        return $item;
    });

    return $data;
}


    public function styles(Worksheet $sheet)
    {
        $sheet->getRowDimension('1')->setRowHeight(50); 
        $sheet->getColumnDimension('A')->setWidth(20);  
        $sheet->getRowDimension('3')->setRowHeight(30); 

        $sheet->mergeCells('B1:G1');
        $sheet->setCellValue('B1', 'Laporan CCTV');

        $sheet->getStyle('B1:G1')->applyFromArray([
            'font' => [
                'bold' => true,
                'size' => 20,
            ],
            'alignment' => [
                'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
            ],
        ]);

        $sheet->getStyle('A3:F3')->applyFromArray([
            'font' => [
                'bold' => true,
                'size' => 14,
            ],
            'alignment' => [
                'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
            ],
        ]);
        $sheet->getStyle('G3')->applyFromArray([
            'font' => [
                'bold' => true,
                'size' => 14,
            ],
            'alignment' => [
                'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
            ],
        ]);
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function(AfterSheet $event) {
                $sheet = $event->sheet->getDelegate();
                $maxRow = $sheet->getHighestRow();

                $sheet->getStyle("A4:G{$maxRow}")->applyFromArray([
                    'alignment' => [
                        'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_LEFT,
                        'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
                    ],
                ]);
                $sheet->getStyle("G4:G{$maxRow}")->getAlignment()->setWrapText(true);
                // Menambahkan format tabel
                $sheet->setAutoFilter('A3:G3');
                $sheet->getStyle('A3:G'.$maxRow)->applyFromArray([
                    'borders' => [
                        'allBorders' => [
                            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                            'color' => ['argb' => 'FF000000'],
                        ],
                    ],
                ]);
            },
        ];
    }
}
