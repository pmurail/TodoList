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
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->unique();
            $table->longText('content');
            $table->foreignIdFor(\App\Models\User::class)
                ->nullable()
                ->constrained()
                ->onUpdate("restrict")
                ->onDelete("SET NULL");
            $table->foreignIdFor(\App\Models\Category::class)
                ->nullable()
                ->constrained()
                ->onUpdate("restrict")
                ->onDelete("SET NULL");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
