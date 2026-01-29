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
        Schema::table('productos', function (Blueprint $table) {
            if (!Schema::hasColumn('productos', 'nombre')) {
                $table->string('nombre')->after('id');
            }
            if (!Schema::hasColumn('productos', 'descripcion')) {
                $table->text('descripcion')->nullable()->after('nombre');
            }
            if (!Schema::hasColumn('productos', 'precio')) {
                $table->decimal('precio', 8, 2)->after('descripcion');
            }
            if (!Schema::hasColumn('productos', 'stock')) {
                $table->integer('stock')->default(0)->after('precio');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('productos', function (Blueprint $table) {
            $table->dropColumn(['nombre', 'descripcion', 'precio', 'stock']);
        });
    }
};
