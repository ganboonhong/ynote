<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdminFunctionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admin_functions', function (Blueprint $table) {
            $table->increments('admin_function_id');
            $table->string('name', 100);
            $table->integer('admin_function_type_id')->unsigned();
            $table->timestamps();

            $table->foreign('admin_function_type_id')->references('admin_function_type_id')->on('admin_function_types');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('admin_functions', function(Blueprint $table){
            $table->dropForeign('admin_functions_admin_function_type_id_foreign');
        });
        Schema::drop('admin_functions');
        Schema::drop('admin_function_types');
    }
}
