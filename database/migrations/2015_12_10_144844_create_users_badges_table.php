<?php


use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('users_badges', function (Blueprint $table) {
            $table->foreignId('user_id')
                ->constrained()
                ->cascadeOnDelete();
            $table->foreignId('badge_id')
                ->constrained();
            $table->unsignedInteger('repetitions');
            $table->timestamp('unlocked_at')->nullable();
            $table->timestamps();
            $table->primary([
                'user_id',
                'badge_id',
            ]);
        });
    }

    public function down(): void
    {
        Schema::drop('users_badges');
    }
};
