<?php


use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('users_questions', function (Blueprint $table) {
            $table->foreignId('user_id')
                ->constrained()
                ->cascadeOnDelete();
            $table->foreignId('question_id')
                ->constrained();
            $table->unsignedInteger('points');
            $table->string('answers');
            $table->timestamps();
            $table->primary([
                'user_id',
                'question_id',
            ]);
        });
    }

    public function down(): void
    {
        Schema::drop('users_questions');
    }
};
