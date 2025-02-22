<?php

namespace App\Models;
use App\Models\TipoSolicitud;
use App\Models\CatalogoAreas;
use App\Models\Extension;
use App\Models\Ubicacion;
use App\Models\Contacto;
use App\Models\Llamada;
use App\Models\Prioridad;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

class Solicitud extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'tbl_solicitudesGeneral';

    protected $fillable = [
        'id',
        'folio',
        'nombre',
        'apellidoPaterno',
        'apellidoMaterno',
        'idTipoSolicitud',
        'idPrioridad',
        'idEstatus',
        'descripcion',
        'diasTranscurridos',
        'curp_usuario',
        'nombre_usuario',
        'idExtension',
        'idUbicacion',
        'idContacto',
        'idLlamada',
    ];

    protected $guarded = [];


    //METODOS QUE HACEN 'JOIN' PARA MOSTRAR EL VALOR DEL ID EN LA TABLA DE TODAS LAS SOLICITUDES
    public function tipoSolicitud()
    {
        return $this->belongsTo(TipoSolicitud::class, 'idTipoSolicitud', 'idTipoSolicitud');
    }

    public function prioridad()
    {
        return $this->belongsTo(Prioridad::class, 'idPrioridad', 'idPrioridad');
    }

    public function estatus()
    {
        return $this->belongsTo(Estatus::class, 'idEstatus', 'idEstatus');
    }

    //actualizarDIAS TRANSCURRIDOS
    public static function actualizarDiasTranscurridos()
    {
        DB::statement('EXEC ActualizarDiasTranscurridos');
    }

    public static function actualizarDiasUnRegistro()
    {
        DB::statement('EXEC ActualizarDiasUnRegistro');
    }

    //TABLA DIVIDIDA
    public function extension()
    {
        return $this->belongsTo(Extension::class, 'idExtensionSolicitud', 'idExtensionSolicitud');
    }
    public function ubicacion()
    {
        return $this->belongsTo(Ubicacion::class, 'idUbicacion', 'idUbicacion');
    }
    public function contacto()
    {
        return $this->belongsTo(Contacto::class, 'idContacto', 'idContacto');
    }
    public function llamada()
    {
        return $this->belongsTo(Llamada::class, 'idLlamada', 'idLlamada');
    }


    public static function listarSolicitudes()
    {
        return DB::select('SELECT * FROM listarSolicitudes');
    }
    public static function listarSolicitudesSeguimiento()
    {
        return DB::select('SELECT * FROM listarSolicitudes order by idestatus ASC, idprioridad desc;');
    }

    public static function unaSolicitud($folio)
    {
        return DB::select("SELECT * FROM listarSolicitudes WHERE folio = ?", [$folio]);
    }
    public static function catalogoExtension()
    {
        return DB::select('SELECT * FROM catalogoExtensiones');
    }
    public static function catalogoTipoS()
    {
        return DB::select('SELECT * FROM catalogoTipoS');
    }

    public static function catalogoCompleto()
    {
        return DB::select('SELECT extension
        ,area
        ,tipoSolicitud
        ,prioridad
        FROM catalogoCompleto
        ORDER BY idArea, idExtensionCatalogo, idPrioridad;');
    }


}
