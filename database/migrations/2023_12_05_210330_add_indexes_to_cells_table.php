<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('cells', function (Blueprint $table) {
            $table->index('model');
            $table->index('wrap_color_id');
            $table->index('ring_color_id');
            $table->index('sold');
            // Add more indexes as needed
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // No need to define the down method for this migration
        // as we're just adding indexes and not modifying the table structure.
    }
};
