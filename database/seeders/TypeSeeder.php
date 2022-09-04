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

class TypeSeeder extends Seeder
{
    public function run()
    {
        DB::table('types')->insert([
            'description' => 'Bug',
        ]);
        DB::table('types')->insert([
            'description' => 'Support',
        ]);
    }
}