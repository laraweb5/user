<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable2 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            #$table->increments('id');
            #$table->timestamps();
			
			$table->increments('id');
			$table->string('name', 32);  /* 追加  */
			$table->string('mail');      /* 追加 */
			$table->string('gender');    /* 追加 */
			$table->integer('age');      /* 追加 */
			$table->string('pref');      /* 追加 */
			$table->string('birthday');  /* 追加 */
			$table->integer('tel');      /* 追加 */
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
        Schema::drop('users');
    }
}
