<?php

namespace Database\Seeders;

use App\Http\Resources\CarsMarks;
use App\Models\Cars_mark;
use App\Models\Cars_models;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class Cars_modelsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $brands = Cars_mark::pluck('id');
        // $brands = DB::table('cars_marks')->pluck('id');
        $models = 
        [
            ['Nexia', 'Matiz'],
            ['Almera'],
            ['RIO'],
            ['Land Cruiser', 'RAV4'],
        ];

        $i = 0;
        $car_models=[];
        foreach($brands as $brand) {
            $car_models[$brand] = $models[$i++];}

        foreach ($car_models as $key => $model) {
            foreach ($model as $item) {
                DB::table('cars_models')->insert([
                    'id'=>Str::uuid(),
                    'car_model' => $item,
                    'cars_mark_id' => $key,
                    'created_at'=>now()
                ]);
            }
        }
        
    }
}
        


            //     DB::table('cars_marks')->insert([
            //         foreach ($cars_mark as $item) {
            //             DB::table('cars_marks')->get(
            //                 $cars_mark = 
            //                 [
            //                 1 => 'Daewoo',
            //                 2 => 'Nissan',
            //                 3 => 'KIA',
            //                 4 => 'Toyota'
            //                 ]);
            //             }
            //             'car_mark' => $mark,
            //             'created_at' => now(),
            //             'updated_at' => now(),
            //         ]);
            //     }
            // if ($item = $model) {[
            //     'car_mark_id' => $model];
    //     }
    // }
            
            // DB::table('cars_marks')->get() {
            //     [
            //     1 => 'Daewoo',
            //     2 => 'Nissan',
            //     3 => 'KIA',
            //     4 => 'Toyota'
            //     ]
            // };
            
//             foreach (arr as $item) {
//                if ()
//             };
// }