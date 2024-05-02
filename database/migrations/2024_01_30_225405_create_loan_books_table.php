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
        Schema::create('loan_books', function (Blueprint $table) {
            $table->id();
            $table->string('number');
            $table->string('title');
            $table->string('author');
            $table->string('pages');
            $table->string('category');
            $table->string('lend_date');
            $table->string('redemption_date');
            $table->string('price');
            $table->string('book_status');
            $table->string('student_name');
            $table->string('phone_number');
            $table->string('card_number');
            $table->string('status');
            $table->string('observation');
            $table->unsignedBigInteger('userId');
            $table->foreign('userId')->references('id')->on('users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('loan_books');
    }
};
