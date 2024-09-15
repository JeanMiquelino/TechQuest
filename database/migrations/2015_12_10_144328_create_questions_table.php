<?php


use Gamify\Models\Question;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('questions', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('question');
            $table->text('solution')->nullable();
            $table->enum('type', [Question::SINGLE_RESPONSE_TYPE, Question::MULTI_RESPONSE_TYPE]);
            $table->boolean('hidden')->default(false);
            $table->enum('status', [
                Question::DRAFT_STATUS,
                Question::PUBLISH_STATUS,
                Question::PENDING_STATUS,
                Question::FUTURE_STATUS,
            ])->default(Question::DRAFT_STATUS);

            $table->foreignId('created_by')
                ->nullable()
                ->constrained('users');

            $table->foreignId('updated_by')
                ->nullable()
                ->constrained('users');

            $table->foreignId('deleted_by')
                ->nullable()
                ->constrained('users');

            $table->timestamp('publication_date')->nullable();
            $table->timestamp('expiration_date')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('questions');
    }
};
