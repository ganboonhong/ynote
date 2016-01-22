<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table        = 'categories';
    protected $primaryKey   = 'category_id';

    protected $fillable     = [
        'name',
        'name_en',
        'sort',
        'user_id'
    ];

    /**
     * A category has many articles.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function articles()
    {
        return $this->hasMany('App\Article');
    }
}
