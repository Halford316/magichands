<?php

namespace Database\Seeders;

use App\Models\Local;
use Illuminate\Database\Seeder;

class LocalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $local = new Local();
        $local->nombre = 'Local 1';
        $local->save();

        $local = new Local();
        $local->nombre = 'Local 2';
        $local->save();

        $local = new Local();
        $local->nombre = 'Local 3';
        $local->save();

        $local = new Local();
        $local->nombre = 'Local 4';
        $local->save();
    }
}
