<?php

use Illuminate\Database\Seeder;
use App\User;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;

class CreateUser extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

      $Admin = new User();
      $Admin -> name = 'Admin Procu';
      $Admin -> email = 'admin@procu.tlx';
      $Admin -> password = Hash::make('12345');
      $Admin -> saveOrFail();

      $Admin = new User();
      $Admin -> name = 'Ejemplo';
      $Admin -> email = 'ejemplo@procu.tlx';
      $Admin -> password = Hash::make('12345');
      $Admin -> saveOrFail();

      $Admin = new User();
      $Admin -> name = 'Prueba';
      $Admin -> email = 'prueba@procu.tlx';
      $Admin -> password = Hash::make('12345');
      $Admin -> saveOrFail();

      $Admin = new User();
      $Admin -> name = 'Prueba Ejemplo';
      $Admin -> email = 'pruebej@procu.tlx';
      $Admin -> password = Hash::make('12345');
      $Admin -> saveOrFail();

      $Admin = new User();
      $Admin -> name = 'Hopkins';
      $Admin -> email = 'hopkins@procu.tlx';
      $Admin -> password = Hash::make('12345');
      $Admin -> saveOrFail();

      $Admin = new User();
      $Admin -> name = 'Graham';
      $Admin -> email = 'graham@procu.tlx';
      $Admin -> password = Hash::make('12345');
      $Admin -> saveOrFail();

      $Admin = new User();
      $Admin -> name = 'Escobar';
      $Admin -> email = 'escobar@procu.tlx';
      $Admin -> password = Hash::make('12345');
      $Admin -> saveOrFail();

      $Admin = new User();
      $Admin -> name = 'Barnes';
      $Admin -> email = 'barnes@procu.tlx';
      $Admin -> password = Hash::make('12345');
      $Admin -> saveOrFail();

      $Admin = new User();
      $Admin -> name = 'Knowles';
      $Admin -> email = 'knowles@procu.tlx';
      $Admin -> password = Hash::make('12345');
      $Admin -> saveOrFail();

      $Admin = new User();
      $Admin -> name = 'Ferry';
      $Admin -> email = 'ferry@procu.tlx';
      $Admin -> password = Hash::make('12345');
      $Admin -> saveOrFail();

      $Admin = new User();
      $Admin -> name = 'Lutz';
      $Admin -> email = 'lutz@procu.tlx';
      $Admin -> password = Hash::make('12345');
      $Admin -> saveOrFail();

      $Admin = new User();
      $Admin -> name = 'Allen';
      $Admin -> email = 'allen@procu.tlx';
      $Admin -> password = Hash::make('12345');
      $Admin -> saveOrFail();

    }
}