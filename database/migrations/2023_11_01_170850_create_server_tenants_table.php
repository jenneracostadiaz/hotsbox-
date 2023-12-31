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
        Schema::create('server_tenants', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('server_id');
            $table->foreign('server_id')->references('id')->on('servers');

            $table->string('tenant');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('server_tenants');
    }
};
