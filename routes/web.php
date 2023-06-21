<?php

use App\Http\Controllers\TopsisController;
use App\Http\Controllers\TopsisTestController;
use App\Http\Controllers\ExcelController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Models\Criteria;
use App\Models\Alternative;
use App\Models\AlternativeValue;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('ranking-list');
// });
Route::get('/', function () {
    return redirect('/matrix');
});

Route::get('/matrix', [TopsisController::class, 'index'])->name('ranking-list');
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/normalisasi', function () {
    $data = Alternative::with('values')->get();
    $criterias = Criteria::all();

    $weight = Criteria::pluck('weight', 'id');
    $topsis = new TopsisTestController();

    $data1 = $topsis->normalizedMatrix($criterias->count());
    $data2 = $topsis->weightedMatrix($data1['normalizedValue'], $weight);

    return view('normalitation-matrix', [
            'data' => $data,
            'criterias' => $criterias,
            'normalizedMatrix' => $data1['normalizedValue'],
            'divider' => $data1['divider'],
            
        ]);
});


Route::get('/terbobot', function () {
    $data = Alternative::with('values')->get();
    $criterias = Criteria::all();

    $weight = Criteria::pluck('weight', 'id');
    $topsis = new TopsisTestController();

    $data1 = $topsis->normalizedMatrix($criterias->count());
    $data2 = $topsis->weightedMatrix($data1['normalizedValue'], $weight);

    return view('normalitation-matrix-terbobot', [
            'data' => $data,
            'criterias' => $criterias,
            'normalizedMatrix' => $data1['normalizedValue'],
            'divider' => $data1['divider'],
            'weightedMatrix' => $data2,
        ]);
});

Route::get('/negatif', function () {
    $topsisController = new TopsisController();
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

    $positiveNegative = $topsisController->mergePositiveNegative($data5, $data6);
    $positiveNegativeIdeal = $topsisController->mergePositiveNegative($data3, $data4);

    return view('jarak-positif-negatif',[
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
});

Route::get('/ideal', function () {
    $topsisController = new TopsisController();
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

    $positiveNegative = $topsisController->mergePositiveNegative($data5, $data6);
    $positiveNegativeIdeal = $topsisController->mergePositiveNegative($data3, $data4);

    return view('jarak-positif-negatif-ideal',[
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
});

Route::get('/preference-value', function () {
    $topsisController = new TopsisController();
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

    $positiveNegative = $topsisController->mergePositiveNegative($data5, $data6);
    $positiveNegativeIdeal = $topsisController->mergePositiveNegative($data3, $data4);

    return view('nilai-preferensi',[
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
});

Route::get('/conclusion', function () {
    $topsisController = new TopsisController();
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

    $positiveNegative = $topsisController->mergePositiveNegative($data5, $data6);
    $positiveNegativeIdeal = $topsisController->mergePositiveNegative($data3, $data4);

    return view('kesimpulan',[
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
});


Route::get('/upload', function () {
    return view('upload');
})->name('upload-form');

Route::post('/upload', [ExcelController::class, 'upload'])->name('upload');

// Route::get('/ranking-list', [TopsisController::class, 'calculate'])->name('ranking-list');
Route::get('/test', [TopsisTestController::class, 'index'])->name('test');
