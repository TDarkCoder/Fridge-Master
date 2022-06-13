<?php declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('bookings', static function (Blueprint $table): void {
            $table->id();
            $table
                ->foreignId('location_id')
                ->nullable()
                ->constrained('locations')
                ->cascadeOnUpdate()
                ->nullOnDelete();
            $table
                ->foreignId('room_id')
                ->nullable()
                ->constrained()
                ->cascadeOnUpdate()
                ->nullOnDelete();
            $table
                ->foreignId('user_id')
                ->nullable()
                ->constrained('users')
                ->cascadeOnUpdate()
                ->nullOnDelete();
            $table->string('key');
            $table->float('volume')->comment('in m3');
            $table->integer('duration')->comment('in days');
            $table->float('invoice')->nullable();
            $table->enum('status', [
                'pending',
                'cancelled',
                'active',
                'completed',
            ])->default('pending');
            $table->timestamps();
        });

        Schema::table('blocks', static function(Blueprint $table): void {
            $table->dropColumn('is_busy');
            $table
                ->foreignId('booking_id')
                ->nullable()
                ->constrained('bookings')
                ->cascadeOnUpdate()
                ->nullOnDelete();
        });
    }

    public function down(): void
    {
        Schema::table('blocks', static function(Blueprint $table): void {
            $table->boolean('is_busy')->default(false);
            $table->dropForeign(['booking_id']);
            $table->dropColumn('booking_id');
        });

        Schema::dropIfExists('bookings');
    }
};
