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
        Schema::table('copies', function (Blueprint $table) {
            $table->bigInteger('book_id')->unsigned()->default(1)->after('id');
            $table->foreign('book_id')->references('id')->on('books')
            ->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('covers', function (Blueprint $table) {
            $table->dropForeign(['books_id']);
            $table->dropColumn('book_id');
        });
    }
};
