<?php

namespace Database\Seeders;

use App\Models\Course;
use Illuminate\Database\Seeder;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // for ($i=0; $i <=3 ; $i++) {
        //     for ($j=0; $j <=6 ; $j++) {
        //         Course::create([
        //             'category_id' => $i,
        //             'trainer_id	' => rand(1,5),
        //             'name' => "course num $j category num $j",
        //             'small_desc' => "woehfgwe7fg7wegf7ugwe7gf7weg",
        //             'desc' => "hewuifbewbfuiewuifbuiwefugbweugfuwgeufuiwebfuiewuf",
        //             'price' => rand(1000 , 2000),
        //             'image' => "$i$j.png",
        //         ]);
        //     }
        // }
                Course::factory(10)->create();

    }
}
