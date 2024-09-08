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
        Schema::create('companies', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('users_id');
            $table->string('company', 50);
            $table->string('co_email')->nullable();
            $table->string('co_phone', 45)->nullable();
            $table->string('co_mobile', 45)->nullable();
            $table->string('min_rate', 4)->default('3');
            $table->boolean('multi_loc')->default(false);
            $table->enum('status', ['active', 'suspended', 'cancelled'])->default('active');
            $table->timestamp('created_at')->useCurrent(); 
            $table->timestamp('updated_at')->nullable(); 

            $table->foreign('users_id')
            ->references('id')
            ->on('users')
            ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('companies');
    }
};
