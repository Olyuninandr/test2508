<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tests', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('head_main')->nullable();
            $table->string('head_add')->nullable();
            $table->string('category')->nullable();
            $table->string('maker')->nullable();
            $table->string('name')->nullable();
            $table->string('code')->nullable();
            $table->text('about')->nullable();
            $table->integer('price')->nullable();
            $table->string('warranty')->nullable();
            $table->string('is_available')->nullable();
            $table->string('extra')->nullable();

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
        Schema::dropIfExists('tests');
    }
}
