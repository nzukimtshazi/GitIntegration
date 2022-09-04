<?php
/**
 * Created by PhpStorm.
 * User: Nzuki Mtshazi
 * Date: 04-Sep-22
 * Time: 7:58 PM
 */

namespace database\seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ClientSeeder extends Seeder
{
    public function run()
    {
        DB::table('clients')->insert([
            'name' => 'Client ABC',
        ]);
        DB::table('clients')->insert([
            'name' => 'Client MNO',
        ]);
        DB::table('clients')->insert([
            'name' => 'Client XYZ',
        ]);
    }
}
