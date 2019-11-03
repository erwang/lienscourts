<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new \App\User(['firstname'=>'Admin','lastname'=>'Roc','email'=>'gallenne_e@lycee-ndduroc.com','password'=>\Illuminate\Support\Facades\Hash::make('123456')]);
        $user->save();
    }
}
