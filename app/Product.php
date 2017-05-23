<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Product extends Model
{

    use softDeletes ;

    protected $fillable = ['title', 'description', 'price', 'picture'];

    protected $dates = ['deleted_at'];

}
