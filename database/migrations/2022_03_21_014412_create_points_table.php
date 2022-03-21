<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePointsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('points', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable(); // Tòa nhà
            $table->string('block')->nullable(); // Khối nhà
            $table->string('floor')->nullable(); // Số tầng
            $table->string('room')->nullable(); // Số hiệu phòng
            $table->string('picture')->nullable(); // Ảnh sơ đồ mặt bằng
            $table->unsignedBigInteger('group_id')->nullable();
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
        Schema::dropIfExists('points');
    }
}
