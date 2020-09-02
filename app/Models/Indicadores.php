<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Indicadores extends Model
{
    protected $table = 'Indicadores';

    public function denuncias(){
        return $this->hasMany('App\Models\Denuncias');
    } 

    public function carpetasDetenidos(){
        return $this->hasMany('App\Models\CarpetasDetenidos');
    } 

    public function carpetasProcedimientos(){
        return $this->hasMany('App\Models\CarpetasProcedimientosCii');
    } 

    public function detenidosCii(){
        return $this->hasMany('App\Models\DetenidosCii');
    } 

    public function imputados(){
        return $this->hasMany('App\Models\Imputados');
    } 

    public function ordenes(){
        return $this->hasMany('App\Models\Ordenes');
    } 

    public function procedimientosVinc(){
        return $this->hasMany('App\Models\ProcedimientosVinculaciones');
    } 

    public function victimas(){
        return $this->hasMany('App\Models\Victimas');
    } 

    public function vinculadosProceso(){
        return $this->hasMany('App\Models\VinculadosProceso');
    } 

}
