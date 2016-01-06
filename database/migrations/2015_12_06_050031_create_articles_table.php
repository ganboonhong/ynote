<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->increments  ('article_id');
            $table->integer     ('category_id')->unsigned();
            $table->integer     ('user_id')->unsigned();
            $table->integer     ('admin_function_type_id')->unsigned();
            $table->string      ('title', 100);
            $table->string      ('title_en', 150);
            $table->enum        ('version_cht', ['Y', 'N'])->default('Y');
            $table->enum        ('version_en', ['Y', 'N'])->default('N');
            $table->text        ('content');
            $table->text        ('content_en');
            $table->text        ('reference');
            $table->integer     ('hits')->unsigned();
            $table->string      ('list_pic');
            $table->enum        ('visible', ['Y', 'N'])->default('Y');
            $table->integer     ('sort')->unsigned();

            $table->foreign     ('category_id')->references('category_id')->on('categories');
            $table->foreign     ('admin_function_type_id')->references('admin_function_type_id')->on('admin_function_types');
            $table->foreign     ('user_id')->references('user_id')->on('users');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('articles', function (Blueprint $table) {
            $table->dropForeign('articles_category_id_foreign');
            $table->dropForeign('articles_user_id_foreign');
            $table->dropForeign('articles_admin_function_type_id_foreign');
        });
    }
}
