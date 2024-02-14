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
        Schema::create('book_partner', function (Blueprint $table) {
            $table->id();

            $table->foreignId('book_id')->constrained()
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreignId('partner_id')->constrained()
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->date('fecha_reserva')->comment('fecha reserva libro');
            $table->date('fecha_devolucion')->nullable()->comment('fecha devolucion libro');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('book_partner');
    }
};
