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
        Schema::create('master_municipalities', function (Blueprint $table) {
            $table->id();
            $table->integer('area_s_code');
            $table->foreign('area_s_code')->references('area_code')->on('master_prefectures')->onDelete('cascade');
            $table->string('area_s_name');
            $table->integer('group_code');
            $table->string('furigana_hiragana');
            $table->string('furigana_katakana');
            $table->string('furigana_s_katakana');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('master_municipalities');
    }
};
