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
        Schema::create('todolist', function (Blueprint $table) {
            $table->id('id_todolist')->autoIncrement();
            $table->string('title');
            $table->unsignedBigInteger('id_category');
            $table->unsignedBigInteger('id_user');
            $table->text('description')->nullable();
            $table->enum('status', ['pending', 'done'])->default('pending');
            $table->dateTime('dateline');
            $table->string('label')->nullable();
            $table->timestamps();

            $table->foreign('id_category')->references('id_category')->on('category')->onDelete('cascade');
            $table->foreign('id_user')->references('id_user')->on('user')->onDelete('cascade');
        });

        Schema::create('label_todolist', function (Blueprint $table) {
            $table->id('id_label_todolist')->autoIncrement();
            $table->unsignedBigInteger('id_todolist');

            $table->foreign('id_todolist')->references('id_todolist')->on('todolist')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('todolist', function (Blueprint $table) {
            Schema::dropIfExists('todolist');
            Schema::dropIfExists('label_todolist');
        });
    }
};
