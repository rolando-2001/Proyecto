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
        Schema::table('mascotas', function (Blueprint $table) {
            $table->string('nombre');
            $table->integer('edad')->default(0); 
            $table->foreignId('raza_mascotas_id')->constrained()->onDelete('cascade');
            $table->foreignId('tipo_mascotas_id')->constrained()->onDelete('cascade');
            $table->string('genero');
            $table->date('fecha');
            $table->text('descripcion');
            $table->string('imagen');
            $table->integer('publicado')->default(1);
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('mascotas', function (Blueprint $table) {
            $table->dropForeign('mascotas_raza_mascotas_id_foreign');
            $table->dropForeign('mascotas_tipo_mascotas_id_foreign');
            $table->dropForeign('mascotas_user_id_foreign');
            $table->dropColumn([
                'nombre', 'edad', 'raza_mascotas_id',
                'tipo_mascotas_id', 'genero', 'fecha',
                'descripcion', 'imagen', 'publicado', 'user_id'
            ]);
        });
    }
};
