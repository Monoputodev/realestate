<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('image');
            $table->string('thumbnail');
            $table->string('subtitle');
            $table->integer('location')->nullable();
            $table->integer('propertystatus')->nullable();
            $table->integer('propertytype')->nullable();
            $table->string('apartment_size')->nullable();
            $table->string('bedroom')->nullable();
            $table->string('completion_date')->nullable();
            $table->longText('experience')->nullable();
            $table->longText('features')->nullable();
            $table->string('brochure')->nullable();
            $table->longText('floor_plan')->nullable();
            $table->integer('status')->nullable()->default(1);
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
        Schema::dropIfExists('projects');
    }
}
