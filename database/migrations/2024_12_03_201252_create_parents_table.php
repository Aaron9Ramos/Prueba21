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
        Schema::create('parents', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained();  
            $table->string('address')->nullable();
            $table->string('mpio')->nullable();
            $table->string('ocupation')->nullable();
            $table->string('company')->nullable();
            $table->string('relationship')->nullable();
            $table->string('foto')->nullable();
            $table->string('ine')->nullable();
            $table->string('qr')->nullable();
            $table->string('pdf')->nullable();
            $table->boolean('status')->comment(' 0: Inactive, 1: Active ')->default(true);
            $table->foreignId('user_type')->constrained(table: 'users', indexName: 'user_type')->nullable();         
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('parents');
    }
};
