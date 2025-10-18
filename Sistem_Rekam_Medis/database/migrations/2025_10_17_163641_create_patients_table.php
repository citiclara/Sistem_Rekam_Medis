<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('patients', function (Blueprint $table) {
            $table->id();
            $table->string('name');          // ✅ nama pasien
            $table->date('birth_date');      // ✅ tanggal lahir
            $table->string('address');       // ✅ alamat
            $table->string('phone');         // ✅ nomor telepon
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('patients');
    }
};
