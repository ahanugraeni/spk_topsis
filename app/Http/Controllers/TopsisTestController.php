<?php

namespace App\Http\Controllers;

use App\Models\Alternative;
use App\Models\AlternativeValue;
use App\Models\Criteria;
use Illuminate\Http\Request;

class TopsisTestController extends Controller
{
    public function index(){
        $criteriaLength = Criteria::count();
        $weight = Criteria::pluck('weight', 'id');

        $data = $this->normalizedMatrix($criteriaLength);
        $data2 = $this->weightedMatrix($data, $weight);

        $data3 = $this->positiveIdealSolution($data2);
        $data4 = $this->negativeIdealSolution($data2);

        $data5 = $this->positiveDistances($data2, $data3);
        $data6 = $this->negativeDistances($data2, $data4);

        $data7 = $this->closenessCoefficient($data5, $data6);

        arsort($data7);

        // $sortedArray = array_combine(array_keys($data7), array_values($data7));

        foreach ($data7 as $key => $value) {
            $sortData[] = [
                'alternative_id' => $key,
                'value' => $value,
            ];
        }
        $test = $this->sortData($data7);

        return response()->json([
            $sortData,
        ]);
    }

    public function normalizedMatrix($criteriaLength) {
        $divider = [];
        $normalizedValue = [];

        for ($criteriaId = 1; $criteriaId <= $criteriaLength; $criteriaId++) {
            $sumOfSquares = 0;

            $alternativeValues = AlternativeValue::where('criteria_id', $criteriaId)->pluck('value', 'alternative_id');

            foreach ($alternativeValues as $value) {
                $sumOfSquares += pow($value, 2);
            }

            $sqrtSumOfSquares = sqrt($sumOfSquares);

            $divider[$criteriaId] = number_format($sqrtSumOfSquares, 2);

        }

        foreach ($divider as $criteriaId => $value) {
            $alternativeValues = AlternativeValue::where('criteria_id', $criteriaId)->pluck('value', 'alternative_id');

            foreach ($alternativeValues as $alternativeId => $value) {
                $normalizedValue[$alternativeId][$criteriaId] = number_format($value / $divider[$criteriaId], 3);
            }
        }
        
        return [
            'divider' => $divider,
            'normalizedValue' => $normalizedValue,
        ];
    }

    public function weightedMatrix(array $normalizedMatrix, $weight) {
        $weightedValue = [];

        foreach ($normalizedMatrix as $alternativeId => $criteria) {
            foreach ($criteria as $criteriaId => $value) {
                $weightResult = $value * $weight[$criteriaId];
                $weightedValue[$alternativeId][$criteriaId] = number_format($weightResult, 3);
            }
        }

        return $weightedValue;
    }

    public function positiveIdealSolution(array $weightedMatrix) {
        $criteriaBenefit = Criteria::where('categories', 'benefit')->pluck('id')->toArray();

        $positiveIdealSolution = [];

        foreach ($weightedMatrix as $alternativeId => $criteria) {
            foreach ($criteria as $criteriaId => $value) {
                if (in_array($criteriaId, $criteriaBenefit)) {
                    if (!isset($positiveIdealSolution[$criteriaId])) {
                        $positiveIdealSolution[$criteriaId] = $value;
                    } else {
                        if ($value > $positiveIdealSolution[$criteriaId]) {
                            $positiveIdealSolution[$criteriaId] = $value;
                        }
                    }
                } else {
                    if (!isset($positiveIdealSolution[$criteriaId])) {
                        $positiveIdealSolution[$criteriaId] = $value;
                    } else {
                        if ($value < $positiveIdealSolution[$criteriaId]) {
                            $positiveIdealSolution[$criteriaId] = $value;
                        }
                    }
                }
            }
        }

        return $positiveIdealSolution;
    }

    public function negativeIdealSolution(array $weightedMatrix) {
        $criteriaBenefit = Criteria::where('categories', 'cost')->pluck('id')->toArray();

        $negativeIdealSolution = [];

        foreach ($weightedMatrix as $alternativeId => $criteria) {
            foreach ($criteria as $criteriaId => $value) {
                if (in_array($criteriaId, $criteriaBenefit)) {
                    if (!isset($negativeIdealSolution[$criteriaId])) {
                        $negativeIdealSolution[$criteriaId] = $value;
                    } else {
                        if ($value > $negativeIdealSolution[$criteriaId]) {
                            $negativeIdealSolution[$criteriaId] = $value;
                        }
                    }
                } else {
                    if (!isset($negativeIdealSolution[$criteriaId])) {
                        $negativeIdealSolution[$criteriaId] = $value;
                    } else {
                        if ($value < $negativeIdealSolution[$criteriaId]) {
                            $negativeIdealSolution[$criteriaId] = $value;
                        }
                    }
                }
            }
        }

        return $negativeIdealSolution;
    }

    public function positiveDistances(array $weightedMatrix, array $positiveIdealSolution) {
        $positiveDistances = [];

        foreach ($weightedMatrix as $alternativeId => $criteria) {
            $sumOfSquares = 0;

            foreach ($criteria as $criteriaId => $value) {
                $sumOfSquares += pow($value - $positiveIdealSolution[$criteriaId], 2);
            }

            $positiveDistances[$alternativeId] = number_format(sqrt($sumOfSquares), 3);
        }

        return $positiveDistances;
    }

    public function negativeDistances(array $weightedMatrix, array $negativeIdealSolution) {
        $negativeDistances = [];

        foreach ($weightedMatrix as $alternativeId => $criteria) {
            $sumOfSquares = 0;

            foreach ($criteria as $criteriaId => $value) {
                $sumOfSquares += pow($value - $negativeIdealSolution[$criteriaId], 2);
            }

            $negativeDistances[$alternativeId] = number_format(sqrt($sumOfSquares), 3);
        }

        return $negativeDistances;
    }

    public function closenessCoefficient(array $positiveDistances, array $negativeDistances) {
        $closenessCoefficient = [];

        foreach ($positiveDistances as $alternativeId => $value) {
            $closenessCoefficient[$alternativeId] = number_format($negativeDistances[$alternativeId] / ($negativeDistances[$alternativeId] + $positiveDistances[$alternativeId]), 3);
        }

        return $closenessCoefficient;
    }

    public function sortData(array $closenessCoefficient) {
        arsort($closenessCoefficient);

        $sortedArray = array_combine(array_keys($closenessCoefficient), array_values($closenessCoefficient));

        return $sortedArray;
    }
}
