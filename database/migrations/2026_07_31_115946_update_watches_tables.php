<?php

use App\Models\Category;
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
    Schema::table('watches', function (Blueprint $table) {
        // Ajouter uniquement la contrainte sur la colonne existante
        $table->foreign('category_id')
              ->references('id')
              ->on('categories')
              ->nullOnDelete();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
         Schema::table('watches', function (Blueprint $table) {
            $table->dropConstrainedForeignIdFor(Category::class);
        });
    }
};
