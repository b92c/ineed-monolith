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
        Schema::create('freelance_professionals', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->boolean('vip')->index();
            $table->string('profession')->index();
            $table->decimal('service_price', 8, 2);
            $table->enum('charges_by', ['hourly', 'daily', 'project']);
            $table->string('phone');
            $table->string('email')->unique();
            $table->char('cpf', 11)->unique();
            $table->string('street');
            $table->string('number');
            $table->string('neighborhood');
            $table->string('zip_code');
            $table->unsignedBigInteger('city');
            $table->unsignedBigInteger('state');
            $table->unsignedBigInteger('country');
            $table->timestamps();

            // Foreign keys
            $table->foreign('city')->references('id')->on('city')->onDelete('cascade');
            $table->foreign('state')->references('id')->on('state')->onDelete('cascade');
            $table->foreign('country')->references('id')->on('country')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('freelance_professionals', function (Blueprint $table) {
            $table->dropForeign(['city']);
            $table->dropForeign(['state']);
            $table->dropForeign(['country']);
        });

        Schema::dropIfExists('freelance_professionals');
    }
};
