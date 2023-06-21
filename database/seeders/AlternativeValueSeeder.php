<?php

namespace Database\Seeders;

use App\Models\AlternativeValue;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AlternativeValueSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [50, 10, 50, 40, 40, 20, 30, 10, 10, 30],
            [10, 40, 50, 30, 40, 10, 30, 40, 40, 60],
            [30, 30, 50, 50, 40, 20, 30, 40, 40, 30],
            [50, 40, 50, 50, 30, 10, 30, 10, 20, 20],
            [50, 50, 50, 30, 30, 10, 20, 10, 20, 10],
            [20, 40, 20, 60, 50, 20, 30, 50, 40, 50],
            [30, 40, 40, 60, 50, 20, 30, 10, 10, 25],
            [20, 20, 50, 20, 50, 10, 20, 80, 70, 80],
            [20, 40, 50, 40, 30, 20, 20, 40, 30, 10],
            [40, 30, 20, 60, 50, 20, 30, 40, 40, 60],
            [30, 30, 30, 60, 50, 20, 30, 20, 20, 40],
            [50, 40, 40, 70, 50, 20, 30, 30, 30, 40],
            [50, 30, 10, 20, 10, 10, 10, 20, 30, 50],
            [20, 40, 40, 20, 10, 10, 20, 40, 40, 40],
            [50, 30, 30, 70, 50, 20, 30, 30, 40, 40],
            [30, 40, 50, 30, 30, 10, 20, 30, 40, 20],
            [20, 40, 50, 10, 20, 10, 30, 50, 50, 60],
            [30, 40, 40, 70, 50, 10, 10, 10, 10, 10],
            [10, 40, 50, 20, 20, 10, 20, 30, 40, 30],
            [20, 30, 30, 20, 50, 10, 30, 50, 50, 70]
        ];

        $model = [];
        $alternative_id = 1;
        $criteria_id = 1;

        foreach ($data as $row) {
            foreach ($row as $value) {
                $model[] = [
                    'alternative_id' => $alternative_id,
                    'criteria_id' => $criteria_id,
                    'value' => $value
                ];
                $criteria_id++;
            }
            $alternative_id++;
            $criteria_id = 1;
        }

    // insert in AlternativeValue table
    AlternativeValue::insert($model);
    }
}

