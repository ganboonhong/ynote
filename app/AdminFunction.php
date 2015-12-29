<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AdminFunction extends Model
{
    protected $table = 'admin_functions';

    protected $primaryKey = 'admin_function_id';

    protected $fillable = ['name', 'admin_function_type_id'];



}
