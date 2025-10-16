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
        // 3. Table: combat_trades
        Schema::create('combat_trades', function (Blueprint $table) {
            // Primary Key
            $table->string('trade_id', 36)->primary();

            // Foreign Keys
            $table->string('combat_id', 36);
            $table->string('user_id', 36);

            // Foreign Key Constraint
            $table->foreign('combat_id')->references('combat_id')->on('group_combats')->onDelete('cascade');

            // Trade Details
            $table->string('team_id', 10)->comment('Redundant but helpful for fast grouping/analysis');
            $table->dateTime('timestamp')->index();
            $table->string('type', 4)->comment('BUY or SELL');
            $table->decimal('volume', 15, 5)->comment('Size of the trade (e.g., 0.1 lot)');
            $table->decimal('entry_price', 15, 5);
            
            $table->string('status', 10)->comment('open or closed');
            $table->decimal('profit_loss', 15, 2)->nullable()->comment('Realized P/L when the trade is closed (NULL if open)');

            // Indexes for rapid time-series analysis and trade audits
            $table->index(['combat_id', 'user_id']);

            // Standard Eloquent timestamps
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('combat_trades');
    }
};