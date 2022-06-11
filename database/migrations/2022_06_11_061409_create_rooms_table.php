<?php declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('rooms', static function (Blueprint $table): void {
            $table->id();
            $table
                ->foreignId('location_id')
                ->constrained('locations')
                ->cascadeOnUpdate()
                ->cascadeOnDelete();
            $table->tinyInteger('temperature');
            $table->boolean('is_busy')->default(false);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('rooms');
    }
};
