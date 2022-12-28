<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMenusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('menus', function (Blueprint $table) {
            $table->id();
            $table->text('title')->nullable();
            $table->text('nickname')->nullable();
            $table->text('url')->nullable();
            $table->text('url_params')->nullable();
            $table->text('icon')->nullable();
            $table->bigInteger('parent_id')->nullable();
            $table->bigInteger('menu_order')->nullable();
            $table->text('permission')->nullable();
            $table->tinyInteger('status')->nullable()->default('1');
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
        Schema::dropIfExists('menus');
    }
}
