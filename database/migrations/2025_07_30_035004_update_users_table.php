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
        Schema::table('users', function (Blueprint $table) {
            //
            $table->boolean('is_admin')->default(false)->change();
            $table->boolean('is_active')->default(true)->change();
            $table->string('username')->default('')->change();
            $table->string('first_name')->default('')->change();
            $table->string('last_name')->default('')->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            //
            $table->dropColumn(['is_admin', 'is_active', 'username', 'first_name', 'last_name']);
        });
    }
};
