<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CompanyOfferSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('company_offers')->insert([
            [
                'company_id'=>1,
                'headline'=>'見出し',
                'job_title'=>'職種名',
                'introduce'=>'こんにちは！求人募集中です！',
                'thumbnail'=>'',
                'deadline'=>'2022-09-29 21:52:57',
            ],
            [
                'company_id'=>1,
                'headline'=>'見出し',
                'job_title'=>'SE',
                'introduce'=>'こんにちは！求人募集中です！',
                'thumbnail'=>'',
                'deadline'=>'2022-09-29 21:52:57',
            ],
            [
                'company_id'=>1,
                'headline'=>'見出し',
                'job_title'=>'フロントエンドエンジニア',
                'introduce'=>'こんにちは！求人募集中です！',
                'thumbnail'=>'',
                'deadline'=>'2022-09-29 21:52:57',
            ],
        ]);
    }
}
