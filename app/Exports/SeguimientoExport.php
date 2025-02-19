<?php

namespace App\Exports;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;
use Illuminate\Support\Facades\Auth;

class SeguimientoExport implements FromCollection, ShouldAutoSize, WithHeadings, WithEvents
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $idArea = Auth::user()->idArea;

        return collect(DB::select('SELECT [folio]
            ,[nombre]
            ,[apellidoPaterno]
            ,[apellidoMaterno]
            ,[correo]
            ,[telefonoFijo]
            ,[telefonoCelular]
            ,[tipoSolicitud]
            ,[prioridad]
            ,[estatus]
            ,[descripcion]
            ,[extension]
            ,[cct]
            ,[nivelCct]
            ,[nombrePlantel]
            ,[nombreDirector]
            ,[municipio]
            ,[localidad]
            ,[direccionCct]
            ,[horaInicio]
            ,[horaTermino]
            ,[duracionMinutos]
            ,[created_at]
            ,[diasTranscurridos]
            ,[nombre_usuario]
        FROM [listarSolicitudes]
        WHERE [idArea] = ?', [$idArea]));
    }

    public function headings(): array
    {
        return ["FOLIO", "NOMBRE", "APELLIDO PATERNO", "APELLIDO MATERNO","CORREO", 
        "TELÉFONO FIJO", "TELÉFONO CELULAR",
        "TIPO DE SOLICITUD", "PRIORIDAD", "ESTATUS", "DESCRIPCION", 
        "EXTENSION",
        "CCT", "NIVEL", "NOMBRE DEL PLANTEL", "NOMBRE DEL DIRECTOR",
        "MUNICIPIO", "LOCALIDAD", "DIRECCIÓN DEL CCT",
        "HORA DE INICIO", "HORA DE FIN", 
        "DURACIÓN DE LA LLAMADA",
        "FECHA DE SOLICITUD", "DIAS TRANSCURRIDOS", "OPERADORA QUE ATENDIÓ"];
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function(AfterSheet $event) {
                $sheet = $event->sheet;

                $cellRange = 'A1:Y1'; 
                $lastRow = $sheet->getHighestRow();

                $sheet->getStyle($cellRange)->applyFromArray([
                    'font' => ['bold' => true],
                    'fill' => [
                        'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
                        'startColor' => ['rgb' => 'CCCCCC'],
                    ],
                    'alignment' => ['horizontal' => 'center'],
                ]);

                // bordes
                $sheet->getStyle("A1:Y{$lastRow}")->applyFromArray([
                    'borders' => [
                        'allBorders' => [
                            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                            'color' => ['rgb' => '000000'],
                        ],
                    ],
                ]);

                // filtros
                $sheet->setAutoFilter($cellRange);
            },
        ];
    }
}
   
    

