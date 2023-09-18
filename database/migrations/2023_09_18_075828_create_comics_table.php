<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

// Models

use App\Models\Comic;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('comics', function (Blueprint $table) {
            $table->id();
            $table->string('title',100)->nullable(false);
            $table->text('description')->nullable();
            $table->string('thumb', 1024)->nullable(false);
            $table->unsignedDecimal('price', 5, 2)->nullable(false);
            $table->string('series', 100)->nullable(false);
            $table->date('sale_date')->nullable(false);
            $table->string('type', 32)->nullable(false);
            $table->text('artists')->nullable(false);
            $table->text('writers')->nullable(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('comics');
    }
};