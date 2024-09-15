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
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('users_id');
            $table->unsignedBigInteger('location_id');
            $table->enum('oauth_provider', ['none', 'Google', 'Facebook', 'Linked'])->default('none');
            $table->string('oauth_uid', 45)->nullable();
            $table->string('first_name', 45)->nullable();
            $table->string('last_name', 45)->nullable();
            $table->string('email', 45)->nullable();
            $table->string('phone', 12)->nullable();
            $table->string('purchase')->nullable();
            $table->enum('state', ['New', 'inSeq', 'Visited'])->default('New');
            $table->enum('how_added', ['client', 'twoshakes', 'other'])->default('client');
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->nullable()->useCurrent()->useCurrentOnUpdate();

            $table->foreign('users_id')
            ->references('id')
            ->on('users')
            ->onDelete('cascade');

            $table->foreign('location_id')
            ->references('id')
            ->on('locations')
            ->onDelete('cascade');
           
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customers');
    }
};
