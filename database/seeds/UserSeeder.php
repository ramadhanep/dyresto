<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $d = new \App\User;
        $d->name = "Romadhan";
        $d->email = "romadhanedy@gmail.com";
        $d->password = \Hash::make("123321");
        $d->level_id = 1;
        $d->restoran_id = 1;

        $d->save();
    }
}
