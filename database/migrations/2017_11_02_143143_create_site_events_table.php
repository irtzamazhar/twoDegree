<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSiteEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('site_events', function (Blueprint $table) {
            $table->increments('id');
            $table->string('event_title');
            $table->date('event_day');
            $table->time('event_timing1');
            $table->time('event_timing2');
            $table->mediumText('event_detail');
            $table->string('event_image');
            $table->float('place_lng', 10, 6);
            $table->float('place_lat', 10, 6);
            $table->string('address');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('site_events');
    }
}
