<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateManufacturerTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('manufacturer_translations', function (Blueprint $table) {
            $table->integer('id', true);
            $table->unsignedInteger('manufacturer_id');
            $table->integer('language_id')->default(0)->index('language_id');
            $table->string('locale', 50)->default('')->index('locale');
            $table->text('description')->nullable();
            $table->string('meta_title')->nullable();
            $table->string('meta_keywords')->nullable();
            $table->string('meta_description', 512)->nullable();

            $table->unique(['locale', 'manufacturer_id'], 'manufacturer_id-locale');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('manufacturer_translations');
    }
}
