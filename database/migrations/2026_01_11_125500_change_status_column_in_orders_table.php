<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Mengubah kolom status menjadi VARCHAR agar bisa menerima nilai custom seperti 'pemrosesan', 'shipping', dll.
        DB::statement("ALTER TABLE orders MODIFY COLUMN status VARCHAR(191) NOT NULL DEFAULT 'pending'");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Opsional: Kembalikan ke ENUM jika perlu (sesuaikan dengan nilai awal Anda jika ingin rollback)
        // DB::statement("ALTER TABLE orders MODIFY COLUMN status ENUM('pending', 'processing', 'shipped', 'delivered', 'cancelled') NOT NULL DEFAULT 'pending'");
    }
};