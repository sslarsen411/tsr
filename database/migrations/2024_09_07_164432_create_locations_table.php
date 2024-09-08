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
        Schema::create('locations', function (Blueprint $table) {
            $table->id()->unique();
            $table->unsignedBigInteger('company_id');
            $table->string('google_accountID', 50)->nullable();
            $table->string('google_locationID', 50)->nullable();
            $table->string('addr', 50)->nullable();
            $table->string('zip', 5)->nullable();
            $table->string('phone', 20)->nullable();
            $table->string('gbp_url')->nullable();   
            $table->timestamp('created_at')->useCurrent(); 
            $table->timestamp('updated_at')->nullable(); 

            $table->foreign('company_id')
            ->references('id')
            ->on('companies')
            ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('locations');
    }
};
