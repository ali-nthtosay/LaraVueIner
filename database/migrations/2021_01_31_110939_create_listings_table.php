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
        Schema::create('listings', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(
                \App\Models\User::class, 'by_user_id'
            )->constrained('users');
            $table->unsignedTinyInteger('zimmer');
            $table->unsignedTinyInteger('badezimmer');
            $table->unsignedInteger('wohnflaeche');
            $table->tinyText('stadt');
            $table->tinyText('plz');
            $table->tinyText('strasse');
            $table->tinyText('hausnummer');
            $table->unsignedInteger('preis');
            $table->tinyText('wohnungstype');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('listings');
    }
};
