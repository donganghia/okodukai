<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmployeeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employee', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id')->unsigned();
            $table->string('code',15)->unique();
            $table->string('name',25);
            $table->date('birthday')->nullable();
            $table->string('address', 255)->nullable();
            $table->string('email', 50)->unique();
            $table->string('photo')->nullable();
            $table->string('sex',10);
            $table->string('telephone',15)->nullable();
            $table->date('start_date')->nullable();
            $table->string('nationality',30);
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
       Schema::drop('employee');
    }
}
