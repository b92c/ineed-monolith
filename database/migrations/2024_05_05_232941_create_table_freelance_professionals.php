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
            $table->string('reference_point')->nullable();
            $table->string('zip_code');
            $table->string('city');
            $table->string('state', 2);
            $table->string('country');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('freelance_professionals');
    }
};
