<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FlowerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('flowers')->insert([[
//            Category = Hand Bouquet
            'id'=>1,
            'category_id'=>1,
            'flower_name'=>'Aurora Rose',
            'flower_img'=>'flower1.jpg',
            'flower_price'=>'80000',
            'flower_desc'=>'Beautiful red roses. Perfect for your special day like birthday and valentine`s day.'
        ],[
            'id'=>2,
            'category_id'=>1,
            'flower_name'=>'Blue Baby Rose',
            'flower_img'=>'flower2.jpg',
            'flower_price'=>'200000',
            'flower_desc'=>'Soft as born baby! Perfect for baby born day, birthday, mother`s day, and valentine`s day.'
        ],[
            'id'=>3,
            'category_id'=>1,
            'flower_name'=>'Angles Rose',
            'flower_img'=>'flower3.jpg',
            'flower_price'=>'150000',
            'flower_desc'=>'Get a beautiful rose for your beloved angle! Best for birthday, valentine`s day, and mother`s day'
        ],[
            'id'=>4,
            'category_id'=>1,
            'flower_name'=>'Lovey Dovey',
            'flower_img'=>'flower4.jpg',
            'flower_price'=>'180000',
            'flower_desc'=>'Red and pinkish rose for expressing your love. Best for valentine`s day, congratulation, and mother`s day'
        ],[
//            Category = Wedding Bouquet
            'id'=>5,
            'category_id'=>2,
            'flower_name'=>'Sweet Violet',
            'flower_img'=>'flower5.jpg',
            'flower_price'=>'100000',
            'flower_desc'=>'Sweet Violet with cute but elegant style for your very special wedding'
        ],[
            'id'=>6,
            'category_id'=>2,
            'flower_name'=>'Pinky Vanilla',
            'flower_img'=>'flower6.jpg',
            'flower_price'=>'120000',
            'flower_desc'=>'You`re beautiful, but pink and white roses will make you more beautiful for your wedding'
        ],[
            'id'=>7,
            'category_id'=>2,
            'flower_name'=>'Lovely Pink',
            'flower_img'=>'flower7.jpg',
            'flower_price'=>'150000',
            'flower_desc'=>'Let these lovely pink flowers complete your best appearance on your wedding'
        ],[
            'id'=>8,
            'category_id'=>2,
            'flower_name'=>'Stunning Bride',
            'flower_img'=>'flower8.jpg',
            'flower_price'=>'130000',
            'flower_desc'=>'Mixed rose will make you a stunning bride'
        ],[
//            Category = Fleur Box
            'id'=>9,
            'category_id'=>3,
            'flower_name'=>'Lovely Red',
            'flower_img'=>'flower9.jpg',
            'flower_price'=>'450000',
            'flower_desc'=>'Express your love with red roses with love shape'
        ],[
            'id'=>10,
            'category_id'=>3,
            'flower_name'=>'Special Things',
            'flower_img'=>'flower10.jpg',
            'flower_price'=>'630000',
            'flower_desc'=>'Mixed mini flowers, roses, accessories, and a doll! This special things fit perfectly for special person!'
        ],[
//            Category = Vase Arrangement
            'id'=>11,
            'category_id'=>4,
            'flower_name'=>'Cutie',
            'flower_img'=>'flower11.jpg',
            'flower_price'=>'230000',
            'flower_desc'=>'Pink flowers with cute arrangement.'
        ],[
            'id'=>12,
            'category_id'=>4,
            'flower_name'=>'Mini Garden',
            'flower_img'=>'flower12.jpg',
            'flower_price'=>'390000',
            'flower_desc'=>'Mixed flowers with a neat arrangement, easy on the eyes, and beautiful.'
        ],[
            'id'=>13,
            'category_id'=>4,
            'flower_name'=>'Flawless',
            'flower_img'=>'flower13.jpg',
            'flower_price'=>'350000',
            'flower_desc'=>'Flawless flowers for your home corner'
        ]]);
    }
}
