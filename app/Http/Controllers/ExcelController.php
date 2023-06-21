<?php

namespace App\Http\Controllers;

use App\Models\Alternative;
use App\Models\AlternativeValue;
use App\Models\Criteria;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ExcelController extends Controller
{
    public function upload(Request $request)
    {
        if ($request->hasFile('excelFile')) {
            $file = $request->file('excelFile');
            $filePath = $file->store('excel_files');
            $excelData = Excel::toArray([], $filePath);

            // Ambil data alternatif
            $alternatives = $excelData[0]; 
            
            // dd($alternatives);
            // Loop melalui data alternatif
            foreach ($alternatives as $alternativeData) {
                // Buat alternatif baru
                $alternative = Alternative::create([
                    'name' => $alternativeData[0],
                ]);


                // Ambil data kriteria, nilai, dan kategori
                $criteria = json_decode($alternativeData[1]);
                $values = json_decode($alternativeData[2]);
                $categories = explode(", ",$alternativeData[3]);
                // dd($criteria);
                // dd($values);
                // dd($categories);
                // Loop melalui data kriteria, nilai, dan kategori
                for ($i = 0; $i < count($criteria); $i++) {

                    // Buat nilai alternatif
                    AlternativeValue::create([
                        'alternative_id' => $alternative->id,
                        'criteria_id' => $i+1,
                        'value' => $values[$i],
                        'category' => $categories[$i],
                    ]);
                }
            }

            return redirect()->route('ranking-list');
        }

        return response()->json(['error' => 'No file uploaded'], 400);
    }
}
