<?php

use Illuminate\Database\Seeder;

class LinkTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = \App\User::find(1);

        $link = new \App\Link(['shorturl'=>'google','url'=>'http://www.google.fr','user_id'=>$admin->id]);
        $link->save();

        /** @var \Illuminate\Routing\RouteCollection $routeCollection */
        $routeCollection = Route::getRoutes();
        foreach ($routeCollection as $value) {
            $link = new \App\Link(['shorturl'=>$value->uri,'url'=>env('APP_URL'),'user_id'=>$admin->id]);
            $link->save();
        }

    }
}
