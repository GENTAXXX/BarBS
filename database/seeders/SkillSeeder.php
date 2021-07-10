<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SkillSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $skill = [
            [
                'skill' => 'VueJS',
            ],
            [
                'skill' => 'JavaScript',
            ],
            [
                'skill' => 'PHP',
            ],
            [
                'skill' => 'Laravel',
            ],
            [
                'skill' => 'Bootstrap',
            ],

        ];

        DB::table('skill')->insert($skill);
    }
}
