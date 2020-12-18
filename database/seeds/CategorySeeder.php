<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([[
            'id'=>1,
            'category_name'=>'Hand Bouquet (Gift)',
            'category_img'=>'category1.jpg'
        ],[
            'id'=>2,
            'category_name'=>'Wedding Bouquet',
            'category_img'=>'category2.jpg'
        ],[
            'id'=>3,
            'category_name'=>'Fleur Box',
            'category_img'=>'category3.jpg'
        ],[
            'id'=>4,
            'category_name'=>'Vase Arrangements',
            'category_img'=>'category4.jpg'
        ]]);
    }
}
