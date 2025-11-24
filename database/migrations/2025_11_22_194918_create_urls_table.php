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
        Schema::create('urls', function (Blueprint $table) {
            $table->id(); // id auto-incremental
            $table->text('original_url'); // URL original
            $table->string('short_code')->unique(); // código corto
            $table->unsignedBigInteger('clicks')->default(0); // contador de clics
            $table->timestamps(); // created_at y updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('urls');
    }

};
