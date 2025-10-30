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
    Schema::table('peliculas', function (Blueprint $table) {
        $table->unsignedBigInteger('sucursal_id')->nullable()->after('genero');
        $table->unsignedBigInteger('sala_id')->nullable()->after('sucursal_id');

        $table->foreign('sucursal_id')->references('id')->on('sucursals')->onDelete('cascade');
        $table->foreign('sala_id')->references('id')->on('salas')->onDelete('cascade');
    });
}

public function down()
{
    Schema::table('peliculas', function (Blueprint $table) {
        $table->dropForeign(['sucursal_id']);
        $table->dropForeign(['sala_id']);
        $table->dropColumn(['sucursal_id', 'sala_id']);
    });
}

};
