<?php

namespace Database\Seeders;

use App\Models\Intro;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class IntroSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $intros = [
            [
                'service_name' => 'Sell A Business',
                'intro' => 'abc',
            ],
            [
                'service_name' => 'Buy A Business',
                'intro' => 'abc',
            ],
            [
                'service_name' => 'Visa',
                'intro' => 'abc',
            ]
        ];
        foreach ($intros as $intro) {
            $user = Intro::create($intro);

        }
    }
}
