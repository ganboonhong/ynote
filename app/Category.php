<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table        = 'categories';
    protected $primaryKey   = 'category_id';

    protected $fillable     = ['name', 'name_en', 'visible'];
}
