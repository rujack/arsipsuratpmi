<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('surats', function (Blueprint $table) {
            $table->id();
            $table->string('no_surat')->unique();
            $table->boolean('tipe_surat');
            $table->boolean('pengajuan')->default(0);
            $table->enum('status', ['pending', 'terima', 'tolak'])->default('pending');
            $table->text('perihal');
            $table->date('tanggal');
            $table->string('pengirim');
            $table->string('penerima');
            $table->string('file')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('surats');
    }
};
