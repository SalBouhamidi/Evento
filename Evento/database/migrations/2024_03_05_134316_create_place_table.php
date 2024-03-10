<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Ville;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('places', function (Blueprint $table) {
            $table->id();
            $table->text('address');
            $table->foreignIdFor(Ville::class)->constrained()->onUpdate('cascade')
            ->onDelete('cascade');
            $table->foreignId('event_id')->constrained()->onUpdate('cascade')
            ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {

        
        Schema::table('places', function (Blueprint $table) {
            $table->dropForeign(['event_id']);
            $table->dropForeign(['ville_id']);
            // $table->dropIfExists('places');
        });
        Schema::dropIfExists('places');

    }
};
