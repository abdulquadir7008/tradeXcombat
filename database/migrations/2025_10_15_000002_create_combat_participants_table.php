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
        // 2. Table: combat_participants
        Schema::create('combat_participants', function (Blueprint $table) {
            
            // Foreign Keys and Composite Primary Key
            $table->string('combat_id', 36);
            $table->string('user_id', 36);
            $table->primary(['combat_id', 'user_id']); // Composite PK

            // Foreign Key Constraint
            $table->foreign('combat_id')->references('combat_id')->on('group_combats')->onDelete('cascade');

            // Player Details
            $table->string('team_id', 10)->comment('Must be either TeamA or TeamB')->index();
            $table->decimal('initial_capital', 15, 2);
            $table->decimal('current_capital', 15, 2);
            $table->decimal('current_unrealizedPL', 15, 2)->default(0.00)->comment('P/L from open trades');
            $table->decimal('total_profit_loss', 15, 2)->default(0.00)->comment('Final P/L contribution (0 until completion)');
            
            // Standard Eloquent timestamps
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('combat_participants');
    }
};