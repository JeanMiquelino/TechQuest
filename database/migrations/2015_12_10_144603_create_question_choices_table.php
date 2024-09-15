<?php


use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('question_choices', function (Blueprint $table) {
            $table->id();
            $table->foreignId('question_id')
                ->constrained()
                ->cascadeOnDelete();
            $table->string('text');
            $table->integer('score');
            $table->index('question_id');
        });
    }

    public function down(): void
    {
        Schema::drop('question_choices');
    }
};
