<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
   public function up()
{
    Schema::table('users', function (Blueprint $table) {
        if (!Schema::hasColumn('users', 'nis_nip')) {
            $table->string('nis_nip')->after('id');
        }

        if (!Schema::hasColumn('users', 'role')) {
            $table->string('role')->default('siswa')->after('nis_nip');
        }
    });
}
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
