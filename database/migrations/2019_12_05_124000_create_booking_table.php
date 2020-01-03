<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->increments('id');
            $table->string('code',6);
            $table->integer('book_id')->unsigned();
            $table->integer('member_id')->unsigned();
            $table->date('out_date')->default(now());
            $table->date('end_date');
            $table->date('return_date')->default(\Carbon\Carbon::create(9999, 12, 31, 00, 00, 00));
            $table->boolean('in_member')->default(false);
            $table->boolean('renew')->default(false);
            $table->boolean('fullfill')->default(false);
            $table->integer('late')->default(0);
            $table->integer('charge')->default(0);
            $table->string('q1',3);
            $table->string('q2',3)->default(null);
            $table->timestamps();

            $table->foreign('book_id')->references('id')->on('books')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('member_id')->references('id')->on('members')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('booking');
    }
}