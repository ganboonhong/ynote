<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $table = 'articles';
    protected $primaryKey = 'article_id';

    protected $fillable =
        [
            'category_id',
            'user_id',
            'admin_function_type_id',
            'title',
            'title_en',
            'version_cht',
            'version_en',
            'content',
            'content_en',
            'reference',
            'hits',
            'visible',
            'sort',
            'list_pic'
        ];
}
