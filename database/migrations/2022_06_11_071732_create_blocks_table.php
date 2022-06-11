<?php declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('blocks', static function (Blueprint $table): void {
            $table->id();
            $table
                ->foreignId('room_id')
                ->constrained('rooms')
                ->cascadeOnDelete()
                ->cascadeOnUpdate();
            $table
                ->float('volume')
                ->default(2)
                ->comment('in m3');
            $table->boolean('is_busy')->default(false);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('blocks');
    }
};
