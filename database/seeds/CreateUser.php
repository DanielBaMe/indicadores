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
    }
}