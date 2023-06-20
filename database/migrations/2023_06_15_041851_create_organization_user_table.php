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
        Schema::create('organization_user', function (Blueprint $table) {
            $table->id();
            //$table->foreignId('user_id')->references('id')->on('users');

            $table->foreignId('user_id')->constrained(
                table: 'users',
                indexName: 'user_id'
            );
            $table->foreignId('organization_id')->constrained(
                table: 'organizations',
                indexName: 'organization_id'
            );
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('organization_user');
    }
};
