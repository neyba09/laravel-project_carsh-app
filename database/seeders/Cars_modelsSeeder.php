<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Cars_modelsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $models = 
        [
            1 => ['Nexia', 'Matiz'],
            2 => ['Almera'],
            3 => ['RIO'],
            4 => ['Land Cruiser', 'RAV4'],
        ];
        foreach ($models as $key => $model) {
            
            foreach ($model as $item) {
                DB::table('cars_models')->insert([
                    'car_model' => $item,
                    'cars_mark_id' => $key,
                    'created_at' => now(),
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