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
        Schema::create('active_requests', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->enum('service_name', [
                'electrical',
                'emergency',
                'one_time',
                'subscription',
                'other',
            ]);
            $table->string('phone', 20);
            $table->text('description');
            $table->enum('status', [
                'active',
                'in_progress',
                'finished',
                'cancelled',
            ])->default('active');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('active_requests');
    }
};
