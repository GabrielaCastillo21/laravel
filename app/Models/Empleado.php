<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empleado extends Model
{
    use HasFactory;

    public $timestamps = false;
    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'id_empleado';

    public function puesto()
    {
        return $this->belongsTo(Puesto::class,'id_puesto','id_puesto');
    }
}
