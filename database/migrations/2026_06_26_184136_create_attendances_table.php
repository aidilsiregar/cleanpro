// database/migrations/xxxx_create_attendances_table.php
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('attendances', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->date('date');
            $table->time('check_in_time')->nullable();
            $table->time('check_out_time')->nullable();
            $table->string('check_in_lat')->nullable();
            $table->string('check_in_lng')->nullable();
            $table->string('check_out_lat')->nullable();
            $table->string('check_out_lng')->nullable();
            $table->text('check_in_address')->nullable();
            $table->text('check_out_address')->nullable();
            $table->enum('status', ['present', 'absent', 'late', 'half_day'])->default('absent');
            $table->text('notes')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('attendances');
    }
};