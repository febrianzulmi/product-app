<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('Barcodes', function (Blueprint $table) {
            $table->id();
            $table->string('barcode_name');     // Nama Barcode
            $table->float('value');            // Nilai Barcode
            $table->timestamp('recorded_at');  // Waktu pengambilan data
            $table->timestamps();              // created_at & updated_at
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('Barcodes');
    }
};
