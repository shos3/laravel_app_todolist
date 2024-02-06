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
        Schema::create('master_prefectures', function (Blueprint $table) {
            $table->id();
            $table->integer('area_code')->unique();
            $table->integer('area_l_code');
            $table->foreign('area_l_code')->references('region_code')->on('master_regions')->onDelete('cascade');
            $table->string('area_name');
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
        Schema::dropIfExists('master_prefectures');
    }
};
