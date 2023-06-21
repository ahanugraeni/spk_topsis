<?php

namespace App\Http\Controllers;

use App\Models\Alternative;
use App\Models\AlternativeValue;
use App\Models\Criteria;
use Illuminate\Http\Request;

class TopsisController extends Controller
{
    public function __construct()
    {

    }
    public function index(){
        // $data = AlternativeValue::with('alternative')->get();
        $data = Alternative::with('values')->get();
        $criterias = Criteria::all();

        $weight = Criteria::pluck('weight', 'id');
        $topsis = new TopsisTestController();

        $data1 = $topsis->normalizedMatrix($criterias->count());
        $data2 = $topsis->weightedMatrix($data1['normalizedValue'], $weight);

        $data3 = $topsis->positiveIdealSolution($data2);
        $data4 = $topsis->negativeIdealSolution($data2);

        $data5 = $topsis->positiveDistances($data2, $data3);
        $data6 = $topsis->negativeDistances($data2, $data4);

        $data7 = $topsis->closenessCoefficient($data5, $data6);

        $data8 = $topsis->sortData($data7);

        $positiveNegative = $this->mergePositiveNegative($data5, $data6);
        $positiveNegativeIdeal = $this->mergePositiveNegative($data3, $data4);

        return view('ranking-list',[
            'data' => $data,
            'criterias' => $criterias,
            'normalizedMatrix' => $data1['normalizedValue'],
            'divider' => $data1['divider'],
            'weightedMatrix' => $data2,
            'positiveIdealSolution' => $data3,
            'negativeIdealSolution' => $data4,
            'positiveDistances' => $data5,
            'negativeDistances' => $data6,
            'closenessCoefficient' => $data7,
            'sortData' => $data8,
            'positiveNegative' => $positiveNegative,
            'positiveNegativeIdeal' => $positiveNegativeIdeal,
        ]);
    }

    public function criteria(Request $request) {
        $request->validate([
            'name' => 'required',
            'weight' => 'required',
            'categories' => 'required',
        ]);

        Criteria::create([
            'name' => $request->name,
            'weight' => $request->weight,
            'categories' => $request->categories,
        ]);
    }

    public function alternative(Request $request) {
        $request->validate([
            'name' => 'required',
        ]);

        Alternative::create([
            'name' => $request->name,
        ]);
    }

    public function createValueCriteria(Request $request) {
        $request->validate([
            'values' => 'required|array',
            'values.*.criteria_id' => 'required',
            'values.*.alternative_id' => 'required',
            'values.*.value' => 'required',
        ]);

        $values = $request->input('values');

        foreach ($values as $data) {
            AlternativeValue::create([
                'criteria_id' => $data['criteria_id'],
                'alternative_id' => $data['alternative_id'],
                'value' => $data['value'],
            ]);
        }
    }

    public function mergePositiveNegative($positive, $negative) {
        $data = [];
        // add positive with add column positive
        foreach ($positive as $key => $value) {
            $data[$key]['positive'] = $value;
        }

        // add negative with add column negative
        foreach ($negative as $key => $value) {
            $data[$key]['negative'] = $value;
        }

        return $data;
    }

}
