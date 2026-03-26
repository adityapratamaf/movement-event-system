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
        Schema::create('guests', function (Blueprint $table) {
            $table->id();
            $table->foreignId('event_id')->constrained()->cascadeOnDelete();
            $table->foreignId('category_id')->constrained()->cascadeOnDelete();
            $table->foreignId('table_id')->nullable()->constrained()->nullOnDelete();
            $table->string('name');
            $table->string('phone')->nullable();
            $table->string('qr_code')->nullable();
            $table->integer('invitation_quota')->default(1);
            $table->integer('total_attendees')->nullable();
            $table->boolean('attendance_status')->default(false);
            $table->dateTime('checkin_at')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('guests');
    }
};
