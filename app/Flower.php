<?php

namespace App;

use Illuminate\Database\Eloquent\Model;use mysql_xdevapi\Table;

class Flower extends Model
{
    //
    protected $table = 'flowers';
    protected $primaryKey = 'Id';
    protected $fillable = ['flower_name','flower_price','flower_img','flower_desc'];

    public function Categories(){
        return $this->belongsTo(Category::class,'category_id','id');
    }
}
