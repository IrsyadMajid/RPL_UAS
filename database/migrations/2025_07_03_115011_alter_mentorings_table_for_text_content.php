<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('mentorings', function (Blueprint $table) {
            $table->dropColumn('file_path');
            $table->text('file_content')->nullable()->after('jenis_bimbingan');
        });
    }

    public function down(): void
    {
        Schema::table('mentorings', function (Blueprint $table) {
            $table->dropColumn('file_content');
            $table->string('file_path')->nullable()->after('jenis_bimbingan');
        });
    }
};
