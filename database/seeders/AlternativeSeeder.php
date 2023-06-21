<?php

namespace Database\Seeders;

use App\Models\Alternative;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AlternativeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // createa alternative data from alternative_data.php
        $alternatives = require 'alternative_data.php';

        // create alternative
        foreach ($alternatives as $alternative) {
            $alternative = Alternative::create([
                'name' => $alternative['name'],
            ]);
        }
    }
}
