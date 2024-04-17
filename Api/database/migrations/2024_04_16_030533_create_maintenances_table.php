<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * 
     * 
     * @return void
     */

    //  'unitId',
    //  'assetId',
    //  'itemId',
    //  'userId',
    //  'teamId',
    //  'taskId',
    //  'maintenanceType',
    //  'category',
    //  'maintenanceAt'
    public function up()
    {
        Schema::create('maintenances', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('unitId');
            $table->unsignedBigInteger('assetId');
            $table->unsignedBigInteger('itemId');
            $table->unsignedBigInteger('userId');
            $table->unsignedBigInteger('teamId');
            $table->unsignedBigInteger('taskId');
            $table->string('maintenanceType');
            $table->string('category');
            $table->date('maintenanceAt');
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
        Schema::dropIfExists('maintenances');
    }
};
