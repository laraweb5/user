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
			$table->string('name', 32);  /* �ɲ�  */
			$table->string('mail');      /* �ɲ� */
			$table->string('gender');    /* �ɲ� */
			$table->integer('age');      /* �ɲ� */
			$table->string('pref');      /* �ɲ� */
			$table->string('birthday');  /* �ɲ� */
			$table->integer('tel');      /* �ɲ� */
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
