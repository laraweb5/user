<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{

    /**
     * ��ǥ�ȴ�Ϣ���Ƥ���ơ��֥�
     *
     * @var string
     */
     protected $table = 'user_admin';

    //�����Ǥ���褦�˥��������
   # protected $fillable = ['name','mail','gender','age','pref','birthday','tel'];
}
