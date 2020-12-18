<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Category extends Model
{
    //
    protected $table = 'categories';
    protected $primaryKey = 'id';
    protected $fillable = ['category_name, category_img'];

    public function Flower(){
        return $this->hasMany(Flower::class);
    }
}
