<?php

use Illuminate\Database\Seeder;

class LevelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $level__ = ["Administrator", "Waiter", "Kasir", "Owner", "Pelanggan"];

        foreach($level__ as $res){
            $d = new \App\Level;
            $d->level = $res;
            $d->save();
        }

    }
}
