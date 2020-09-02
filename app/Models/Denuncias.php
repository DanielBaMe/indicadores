<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Denuncias extends Model
{

    protected $table = 'denuncias';

    public function indicador(){
        return $this->belongsTo('App\Models\Indicadores', 'id_denuncias');
    }

}
