<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMessagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //database/migrations/<creation_date_>create_messages_table.php
        Schema::create('messages', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            //insert the lines below
            $table->integer('user_id')->unsigned();
            $table->integer('receiver_id')->nullable();
            $table->string('read_by')->nullable();
            $table->integer('is_read')->nullable();
            $table->text('message')->nullable(); 
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('messages');
    }
}
