<?php

use Illuminate\Database\Seeder;
use App\Models\Dependencias;

class CreateDependencia extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $dep = new Dependencias();
        $dep -> nombre = 'Admin';
        $dep -> usuario_id = '1';
        $dep -> saveOrFail();

        $dep = new Dependencias();
        $dep -> nombre = 'Apizaco';
        $dep -> usuario_id = '2';
        $dep -> saveOrFail();

        $dep = new Dependencias();
        $dep -> nombre = 'Calpulalpan';
        $dep -> usuario_id = '3';
        $dep -> saveOrFail();

        $dep = new Dependencias();
        $dep -> nombre = 'Chiautempan';
        $dep -> usuario_id = '4';
        $dep -> saveOrFail();

        $dep = new Dependencias();
        $dep -> nombre = 'Contla';
        $dep -> usuario_id = '5';
        $dep -> saveOrFail();

        $dep = new Dependencias();
        $dep -> nombre = 'Huamantla';
        $dep -> usuario_id = '6';
        $dep -> saveOrFail();

        $dep = new Dependencias();
        $dep -> nombre = 'Ixtacuixtla';
        $dep -> usuario_id = '7';
        $dep -> saveOrFail();

        $dep = new Dependencias();
        $dep -> nombre = 'Nativitas';
        $dep -> usuario_id = '8';
        $dep -> saveOrFail();

        $dep = new Dependencias();
        $dep -> nombre = 'San Pablo';
        $dep -> usuario_id = '9';
        $dep -> saveOrFail();

        $dep = new Dependencias();
        $dep -> nombre = 'Tlaxcala';
        $dep -> usuario_id = '10';
        $dep -> saveOrFail();

        $dep = new Dependencias();
        $dep -> nombre = 'Tlaxco';
        $dep -> usuario_id = '11';
        $dep -> saveOrFail();

        $dep = new Dependencias();
        $dep -> nombre = 'Zacatelco';
        $dep -> usuario_id = '12';
        $dep -> saveOrFail();
    }
}
