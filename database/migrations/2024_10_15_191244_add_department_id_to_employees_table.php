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
        Schema::table('employees', function (Blueprint $table) {
            //
            Schema::table('employees', function (Blueprint $table) {
                $table->foreignId('department_id')->nullable()->constrained()->onDelete('restrict'); // restrict deletion if employees are assigned
            });
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('employees', function (Blueprint $table) {
            //
            Schema::table('employees', function (Blueprint $table) {
                $table->dropForeign(['department_id']);
                $table->dropColumn('department_id');
            });
        });
    }
};
