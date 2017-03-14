<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Eloquent\Model;

class CreateBooksTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Model::unguard();
        Schema::create('books',function(Blueprint $table){
            $table->increments("id");
            $table->string("name");
            $table->string("author")->nullable();
            $table->string("year")->nullable();
            $table->string("publisher")->nullable();
            $table->integer("catalogs_id")->references("id")->on("catalogs")->nullable();
            $table->integer("user_id")->references("id")->on("user")->nullable();
            $table->text("body")->nullable();
            $table->string("price")->nullable();
            $table->string("picture")->nullable();
            $table->enum("showhide", ["show", "hide", ])->nullable();
            $table->string("url")->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('books');
    }

}