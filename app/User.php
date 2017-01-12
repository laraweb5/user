<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{

    /**
     * モデルと関連しているテーブル
     *
     * @var string
     */
     protected $table = 'user_admin';

    //挿入できるようにカラムを宣言
   # protected $fillable = ['name','mail','gender','age','pref','birthday','tel'];
}
