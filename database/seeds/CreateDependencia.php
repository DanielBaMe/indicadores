<?php

use Illuminate\Database\Seeder;
use App\Models\Denuncias;

class CreateDependencia extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $dep = new Denuncias();
        $dep -> nombre_dependencia = 'Admin';
        $dep -> usuario_id = '1';
        $dep -> saveOrFail();
    }
}
