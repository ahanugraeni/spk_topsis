<?php

namespace Database\Seeders;

use App\Models\Criteria;
use App\Models\Alternative;
use Illuminate\Database\Seeder;
use App\Models\AlternativeValue;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class TopsisSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $alternatives = require 'alternative_data.php';

        
    }
}
