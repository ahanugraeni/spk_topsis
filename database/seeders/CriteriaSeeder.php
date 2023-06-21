<?php

namespace Database\Seeders;

use App\Models\Criteria;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CriteriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'name' => 'Harga',
                'weight' => 0.15,
                'categories' => 'cost',
            ],
            [
                'name' => 'Tahun Rilis',
                'weight' => 0.1,
                'categories' => 'benefit',
            ],
            [
                'name' => 'Jenis Sepatu',
                'weight' => 0.2,
                'categories' => 'benefit',
            ],
            [
                'name' => 'Bahan Sepatu',
                'weight' => 0.1,
                'categories' => 'benefit',
            ],
            [
                'name' => 'Kegunaan',
                'weight' => 0.15,
                'categories' => 'benefit',
            ],
            [
                'name' => 'Jenis',
                'weight' => 0.05,
                'categories' => 'cost',
            ],
            [
                'name' => 'Gender',
                'weight' => 0.05,
                'categories' => 'benefit',
            ],
            [
                'name' => 'Rating dan Ulasan',
                'weight' => 0.05,
                'categories' => 'benefit',
            ],
            [
                'name' => 'Merek',
                'weight' => 0.05,
                'categories' => 'benefit',
            ],
            [
                'name' => 'Kualitas',
                'weight' => 0.1,
                'categories' => 'benefit',
            ],

        ];

        foreach ($data as $criteria) {
            $criteria = Criteria::create([
                'name' => $criteria['name'],
                'weight' => $criteria['weight'],
                'categories' => $criteria['categories'],
            ]);
        }
    }
}
