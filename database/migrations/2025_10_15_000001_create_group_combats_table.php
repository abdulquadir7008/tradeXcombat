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
        // 1. Table: group_combats
        Schema::create('group_combats', function (Blueprint $table) {
            // Primary Key (VARCHAR(36) as per schema)
            $table->string('combat_id', 36)->primary();
            
            // Global Identifiers
            $table->string('app_id', 36)->comment('Corresponds to __app_id from the environment.')->index();

            // Combat Status and Timeline
            $table->string('status', 20)->comment('e.g., waiting, in_progress, completed, cancelled')->index();
            $table->string('asset_pair', 10)->comment('e.g., EUR/USD, GBP/JPY')->index();
            $table->integer('duration_minutes');
            $table->dateTime('start_time')->index();
            $table->dateTime('end_time');

            // Team Information and Current Scores
            $table->string('winner_team_id', 10)->nullable()->comment('ID of the winning team (TeamA or TeamB)');

            $table->string('teamA_name', 50);
            $table->decimal('teamA_currentPL', 15, 2)->default(0.00)->comment('Current realized/unrealized P/L for Team A');

            $table->string('teamB_name', 50);
            $table->decimal('teamB_currentPL', 15, 2)->default(0.00)->comment('Current realized/unrealized P/L for Team B');

            // Settings
            $table->decimal('settings_initialCapital', 15, 2);
            $table->integer('settings_maxLeverage');

            // Standard Eloquent timestamps
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('group_combats');
    }
};