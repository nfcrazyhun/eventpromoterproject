<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('event_performer', function (Blueprint $table) {
            $table->foreignIdFor(\App\Models\Event::class)->constrained(); //event_id
            $table->foreignIdFor(\App\Models\Performer::class)->constrained(); //performer_id
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('event_performer');
    }
};
