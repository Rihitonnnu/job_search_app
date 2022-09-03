<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CompanyLanguageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('company_languages')->insert([
            'company_offer_id'=>1,
            'ruby'=>1,
            'javascript'=>1,
            'java'=>1,
            'python'=>0,
            'c'=>0,
            'php'=>0,
        ]);
    }
}
