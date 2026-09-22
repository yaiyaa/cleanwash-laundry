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
    Schema::table('pakets', function (Blueprint $table) {
        $table->boolean('menggunakan_setrika')->default(false)->after('estimasi_hari');
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
{
    Schema::table('pakets', function (Blueprint $table) {
        $table->dropColumn('menggunakan_setrika');
    });
}
};
