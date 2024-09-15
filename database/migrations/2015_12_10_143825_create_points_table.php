<?php


use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('points', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')
                ->constrained()
                ->cascadeOnDelete();
            $table->unsignedInteger('points');
            $table->string('description');
            $table->index('user_id');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::drop('points');
    }
};
