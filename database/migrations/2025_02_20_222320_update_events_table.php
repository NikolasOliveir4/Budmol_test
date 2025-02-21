<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::table('events', function (Blueprint $table) {
        $table->datetime('start_at')->change();
        $table->datetime('end_at')->change();
    });
}

public function down()
{
    Schema::table('events', function (Blueprint $table) {
        $table->string('start_at')->change();
        $table->string('end_at')->change();
    });
}
};
