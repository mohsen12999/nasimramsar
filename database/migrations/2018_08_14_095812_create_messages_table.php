<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMessagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('messages', function (Blueprint $table) {
            $table->increments('id');

            $table->string('name', 400)->collation('utf8_unicode_ci');
            $table->string('email', 400);
            $table->string('body', 4000)->collation('utf8_unicode_ci');
            $table->string('ip', 100);

            $table->tinyInteger('readed')->default(0);;

            $table->timestamps();
            $table->softDeletes();
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
