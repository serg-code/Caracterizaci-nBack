<?php

namespace App\Models\Secciones\Integrantes;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Accidente extends Model
{
    use HasFactory;

    protected $table = 'accidentes';

    protected $fillable = [
        'id_integrante',
        'accidentes_transito',
        'tipo_lesion',
        'accidentes_laborales',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    public function pregunta()
    {
        return $this->belongsTo(Pregunta::class, 'ref_campo');
    }

    public static function guardaraccidentes(array $datosaccidente)
    {
        $pregunta = new Accidente($datosaccidente);
        $pregunta->save();
    }

    public function eliminar()
    {
        Accidente::where('id_integrante', '=', $this->id_integrante)->delete();
    }
}
