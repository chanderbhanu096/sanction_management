<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('sanction', function (Blueprint $table) {
            $table->id();
            $table->string('sanction_fy');
            $table->string('district');
            $table->string('block');
            $table->string('gp');
            $table->enum('newgp',['yes','no']);
            $table->decimal('sanction_amt',20,2);
            $table->date('sanction_date');
            $table->string('sanction_head');
            $table->string('sanction_purpose');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sanction');
    }
};
