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
        Schema::create('data_pembimbing', function (Blueprint $table) {
            $table->id();
            $table->string('username');
            $table->string('nip');
            $table->string('email')-> unique();
            $table->string('no_hp');
            $table->string('jabatan');
            $table->string('status');
            $table->string('password');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('data_pembimbing');
    }
};
