<?php

namespace App\Exports;
use Illuminate\Support\Facades\DB;
use App\Models\Solicitud;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;

class SolicitudesExport implements FromCollection, ShouldAutoSize, WithHeadings, WithEvents
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
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
      ,[area]
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
        FROM [listarSolicitudes]'));
    }

    public function headings(): array
    {
        return ["FOLIO", "NOMBRE", "APELLIDO PATERNO", "APELLIDO MATERNO","CORREO", 
        "TELÉFONO FIJO", "TELÉFONO CELULAR",
        "TIPO DE SOLICITUD", "PRIORIDAD", "ESTATUS", "DESCRIPCION", 
        "EXTENSION",
        "ÁREA A LA QUE PERTENECE",
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

                $cellRange = 'A1:Z1'; 
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
                $sheet->getStyle("A1:Z{$lastRow}")->applyFromArray([
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
   
    

